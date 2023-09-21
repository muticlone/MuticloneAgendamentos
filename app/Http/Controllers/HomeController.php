<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use Carbon\Carbon;



use App\Models\User;

class HomeController extends Controller
{


    public function index()
    {



        $search = request('search');


        if ($search) {

            $Cadastro_empresa = cadastro_de_empresa::where(function ($query) use ($search) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                    ->orWhere('nomeFantasia', 'like', '%' . $search . '%')
                    ->orWhere('area_atuacao', 'like', '%' . $search . '%');
            })->paginate(10);
        } else {
            // $Cadastro_empresa = cadastro_de_empresa::all()->reverse();
            $Cadastro_empresa = cadastro_de_empresa::orderBy('id', 'desc')->paginate(20);
        }



        return view('welcome', ['Cadastro_empresa' => $Cadastro_empresa, 'search' => $search]);
    }

    public function showServicos()
    {
        $search = request('search');

        $query = cadastro_de_servico::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomeServico', 'like', '%' . $search . '%')
                    ->orWhere('descricaosevico', 'like', '%' . $search . '%');
            });
        }

        $servico = $query->orderBy('id', 'desc')->paginate(20);

        $paginatedItems = new LengthAwarePaginator(
            $servico->items(),
            $servico->total(),
            $servico->perPage(),
            $servico->currentPage(),
            ['path' => route('home.servicos'), 'query' => ['search' => $search]]
        );

        return view('Empresa.homeservicos', compact('search', 'paginatedItems', 'servico'));
    }




    public function show($id)
    {



        $empresa = cadastro_de_empresa::findOrfail($id);

        $itensPorPagina = 50;


        $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $id)
            ->orderBy('id', 'desc')
            ->paginate($itensPorPagina);



        $Admempresa = User::where('id', $empresa->user_id)->first()->toArray();


        $user = auth()->user();



        $agendamentos = Agendamento::where('cadastro_de_empresas_id', $id)
            ->whereNotNull('nota')
            ->whereNotNull('comentario')
            ->whereNotNull('user_id')
            ->get();

        $notas = $agendamentos->pluck('nota');
        $media = $notas->avg();

        $user_id = $agendamentos->pluck('user_id');

        $useragendamento = User::whereIn('id', $user_id)->get();
        $nome =  $useragendamento->pluck('name');






        return view('Empresa.DadosEmpresa', [
            'empresa' => $empresa,
            'Admempresa' =>  $Admempresa, 'servico' => $servico,

            'media' =>  $media, 'agendamentos' => $agendamentos,
            'nome' =>  $nome
        ]);
    }











    public function dashboard()
    {
        /** @var \App\User $user */
        $user = auth()->user();
        $search = request('search');

        if ($search) {
            $empresa = cadastro_de_empresa::where(function ($query) use ($search, $user) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                    ->orWhere('nomeFantasia', 'like', '%' . $search . '%');
            })
                ->where('user_id', '=', $user->id)
                ->paginate(10);
        } else {
            $empresa = $user->empresas()->paginate(10);
        }

        $ids = [];

        foreach ($empresa as $empresaItem) {

            $ids[] = $empresaItem->id;
        }

        $agendamentos = Agendamento::whereIn('cadastro_de_empresas_id',  $ids)->where('finalizado', 1)->get();
        $temagendamentos = !$agendamentos->isEmpty();

        return view('dashboard', [
            'empresa' => $empresa,

            'search' => $search,
            'temagendamentos' => $temagendamentos
        ]);
    }



    public function categorias()
    {


        return view('busca.buscacategorias');
    }

    public function Showcategorias(Request $request)
    {

        $categoria = $request->input('categoria');
        $nomeDaCategoria = $categoria;

        $empresa = cadastro_de_empresa::where('area_atuacao', $nomeDaCategoria)->get();

        $idsempresa = $empresa->pluck('id')->toArray();



        $servicos = cadastro_de_servico::whereIn('cadastro_de_empresas_id', $idsempresa)->paginate(15);

        //anexando manualmente o categoriaparâmetro aos links de paginação
        $servicos->appends(['categoria' => $nomeDaCategoria]);

        return view('ResuladobuscaCategoria', [
            'servicos' => $servicos,
            'empresa' => $empresa,
            'nomeDaCategoria' => $nomeDaCategoria,
        ]);
    }


}
