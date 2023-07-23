<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;
use Illuminate\Pagination\LengthAwarePaginator;


class CadastroServicoController extends Controller
{

    public function create($id){

      

        $empresa = cadastro_de_empresa::findOrFail($id);
       
        return view('Empresa.CadastroServico',['empresa' => $empresa]);
    }

    public function store(Request $request, cadastro_de_servico $cadastro_de_servico , $id){
        
        $empresa = cadastro_de_empresa::findOrFail($id);
        // $nome = $empresa->nomeFantasia;
        // $nome_da_pasta = $nome . '_' . $id;
        // $requestImage->move(public_path('img/logo_serviços/' . $nome_da_pasta), $imageName);

    $data = $request->all();

    if ($request->hasFile('imageservico') && $request->file('imageservico')->isValid()) {
        $requestImage = $request->file('imageservico');
        $extensao = $requestImage->extension();
        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;
        $requestImage->move(public_path('img/logo_servicos'), $imageName);
        $data['imageservico'] = $imageName;
    }

   
   
    $data['cadastro_de_empresas_id'] =  $id;



    $cadastro_de_servico->create($data); 

    return redirect('/dashboard')->with('msg', 'serviço criado com sucesso!');
    }   


    public function show($id){

      
    

        $servico = cadastro_de_servico::findOrFail($id);
        $id_empresa = $servico->cadastro_de_empresas_id;
        $empresa = cadastro_de_empresa::findOrFail($id_empresa);

        

        return view('Empresa.DadosServico',['servico' => $servico ,'empresa' => $empresa]);

    }

    public function showMeusServicos($id){
        

        $search = request('search');

        $registrosPorPagina = 10; 
        if ($search) {

            $servicos = cadastro_de_servico::where(function ($query) use ($search) {
                $query->where('nomeServico', 'like', '%' . $search . '%');
            })->where('cadastro_de_empresas_id', $id)->paginate($registrosPorPagina);
        } else {
            $servicos = cadastro_de_servico::where('cadastro_de_empresas_id', $id)->paginate($registrosPorPagina);
        }

        

     
       
       

        

        return view('Empresa.MeusServico',['servicos' => $servicos ,'search' => $search]);
    }

    public function edit($id){

        $servico = cadastro_de_servico::findOrfail($id);
        $id_empresa = $servico->cadastro_de_empresas_id;
        $empresa = cadastro_de_empresa::findOrFail($id_empresa);



        return view('Empresa.EditmeusServico',['servico' =>  $servico ,  'empresa' => $empresa] );
    }

    
}

    

