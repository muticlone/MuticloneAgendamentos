<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use App\Models\avaliacao_produto;
use App\Models\produtos_favorito;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CadastroServicoController extends Controller
{

    public function create($id)
    {
        $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $id)->first();


        $empresa = cadastro_de_empresa::findOrFail($id);

        $user = auth()->user();



        if (
            $user->id == $empresa->user_id


        ) {
        } else {
            return back();
        }

        $empresa = cadastro_de_empresa::findOrFail($id);

        return view('Empresa.CadastroServico', ['empresa' => $empresa]);
    }

    public function store(Request $request, cadastro_de_servico $cadastro_de_servico, $id)
    {

        $empresa = cadastro_de_empresa::findOrFail($id);
        // $nome = $empresa->nomeFantasia;
        // $nome_da_pasta = $nome . '_' . $id;
        // $requestImage->move(public_path('img/logo_serviços/' . $nome_da_pasta), $imageName);

        $data = $request->all();
        $data = $request->all();
        $valorDoServico = $data['valorDoServico'];
        $valorDoServico = str_replace('R$ ', '', $valorDoServico); // Remove o prefixo "R$ "
        $valorDoServico = str_replace('.', '', $valorDoServico); // Remove todos os pontos de milhares
        $valorDoServico = str_replace(',', '.', $valorDoServico); // Substitui a vírgula por um ponto
        $data['valorDoServico'] = $valorDoServico; // Atualiza o valor no array de dados



        if ($request->hasFile('imageservico') && $request->file('imageservico')->isValid()) {
            $requestImage = $request->file('imageservico');
            $extensao = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $requestImage->move(public_path('img/logo_servicos'), $imageName);
            $data['imageservico'] = $imageName;
        }



        $data['cadastro_de_empresas_id'] =  $id;
        $data['valorDoServico'] =    $valorDoServico;


        $cadastro_de_servico->create($data);

        $idempresa =  encrypt($empresa->id);

        return redirect('/dados/servicos/' .  $idempresa)->with('msg', 'serviço criado com sucesso!');
    }


    public function show($id)
    {




        $servico = cadastro_de_servico::findOrFail($id);
        $id_empresa = $servico->cadastro_de_empresas_id;
        $empresa = cadastro_de_empresa::findOrFail($id_empresa);

        $avaliacoes = avaliacao_produto::where('idServicos', $id)
            ->where('business_id', $id_empresa)
            ->orderBy('created_at', 'desc')
            ->get();

        $dadosuser = [];

        foreach ($avaliacoes as $avaliacao) {
            $usuario = User::find($avaliacao->usuario_id);

            if ($usuario) {
                $dadosuser[] = [
                    'nome' => $usuario->name,
                    'nota' => $avaliacao->nota
                ];
            }
        }

        $notas = $avaliacoes->pluck('nota');
        $media = $notas->avg();

        $dados = [
            'media' => $media,
            'dadosuser' => $dadosuser
        ];

        $user = auth()->user();

        $iduser=$user->id ?? 0;

        $favorios = produtos_favorito::where('idUsuario' , $iduser)->where('idProduto',$id)->first();

        $dadosFavoritos = [
            'favorito' => $favorios->favoritoProtudo ?? 0
        ];





        return view('Empresa.DadosServico', [
            'servico' => $servico, 'empresa' => $empresa, 'dados' => $dados,
            'dadosuser' => $dadosuser , 'dadosFavoritos' =>    $dadosFavoritos
        ]);
    }

    public function showMeusServicos($id)
    {

        try {
            $id = decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

            return redirect('/dashboard');
        }
        $user = auth()->user();

        $empresa = cadastro_de_empresa::findOrFail($id);



        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        }

        $search = request('search');


        $registrosPorPagina = 20;
        if ($search) {

            $servicos = cadastro_de_servico::where(function ($query) use ($search) {
                $query->where('nomeServico', 'like', '%' . $search . '%');
            })->where('cadastro_de_empresas_id', $id)->paginate($registrosPorPagina);
        } else {

            // $servicos = cadastro_de_servico::where('cadastro_de_empresas_id', $id)
            //     ->orderBy('id', 'desc')
            //     ->paginate($registrosPorPagina);

            $servicos = cadastro_de_servico::where('cadastro_de_empresas_id', $id)
            ->leftJoin('avaliacao_produtos', 'cadastro_de_servicos.id', '=', 'avaliacao_produtos.idServicos')
            ->select('cadastro_de_servicos.*', DB::raw('AVG(avaliacao_produtos.nota) as media'))
            ->groupBy('cadastro_de_servicos.id')
            ->orderBy('id', 'desc')
            ->paginate($registrosPorPagina);

            $idServicos = [];
            foreach ( $servicos as $id){
                $idServicos[] = $id->id;
            }



            // $agendamento = Agendamento::where(function ($query) use ($idServicos) {
            //     foreach ($idServicos as $id) {
            //         $query->orWhereJsonContains('idServicos', $id);
            //     }
            // })->get();





        }



        return view('Empresa.MeusServico', [
            'servicos' => $servicos,
            'search' => $search, 'empresa' => $empresa,

        ]);
    }

    public function edit($id){

        // pagina edit/servicos

        try {
            $id = decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

            return redirect('/dashboard');
        }





        $servico = cadastro_de_servico::findOrfail($id);
        $id_empresa = $servico->cadastro_de_empresas_id;

        $empresa = cadastro_de_empresa::findOrFail($id_empresa);

        $user = auth()->user();





        if (
            $user->id == $empresa->user_id &&

            $empresa->id == $servico->cadastro_de_empresas_id
        ) {
        } else {
            return back();
        }



        return view('Empresa.EditmeusServico', [
            'servico' =>  $servico,
            'empresa' => $empresa,


        ]);
    }

    public function update(Request $request, $id)
    {

        try {
            $id = decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

            return redirect('/dashboard');
        }

        $user = auth()->user();
        $idEmpresa = cadastro_de_servico::where('id', $id)->pluck('cadastro_de_empresas_id')->first();
        $empresa = cadastro_de_empresa::findOrFail( $idEmpresa);
        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {

            $servico = cadastro_de_servico::findOrFail($id);



            $data = $request->all();
            $valorDoServico = $data['valorDoServico'];
            $valorDoServico = str_replace('R$ ', '', $valorDoServico); // Remove o prefixo "R$ "
            $valorDoServico = str_replace('.', '', $valorDoServico); // Remove todos os pontos de milhares
            $valorDoServico = str_replace(',', '.', $valorDoServico); // Substitui a vírgula por um ponto
            $data['valorDoServico'] = $valorDoServico; // Atualiza o valor no array de dados




            if ($request->hasFile('imageservico') && $request->file('imageservico')->isValid()) {

                unlink(public_path('img/logo_servicos/' . $servico->imageservico));
                $requestImage = $request->imageservico;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('img/logo_servicos'), $imageName);
                $data['imageservico'] = $imageName;
            }


            $data['valorDoServico'] =    $valorDoServico;
            cadastro_de_servico::findOrFail($servico->id)->update($data);

            $idServico =  encrypt($servico->cadastro_de_empresas_id);

        }




        return redirect('/dados/servicos/' . $idServico)->with('msg', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {



        try {
            $id = decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

            return redirect('/dashboard');
        }

        $user = auth()->user();
        $idEmpresa = cadastro_de_servico::where('id', $id)->pluck('cadastro_de_empresas_id')->first();
        $empresa = cadastro_de_empresa::findOrFail( $idEmpresa);
        if ($user->id != $empresa->user_id) {
            return redirect('/dashboard');
        } else {


        $servico = cadastro_de_servico::findOrFail($id);

        if (produtos_favorito::where('idProduto', $id)->exists()) {
            produtos_favorito::where('idProduto', $id)->delete();
        }
        cadastro_de_servico::findOrFail($id)->delete();




        $idServico =  encrypt($servico->cadastro_de_empresas_id);


        }







        return redirect('/dados/servicos/' .  $idServico)->with('msg', 'Evento excluído com sucesso!');
    }
}
