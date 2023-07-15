<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;

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

        return view('Empresa.DadosServico',['servico' => $servico]);

    }

    
}

    

