<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;
class AgendamentoController extends Controller


{
  


   public function create(Request $request){

      $idEmpresa =  $request->input('idempresa');
    
      $id = $request->input('servico');

      $idArray = array_keys($id);

      $servico = cadastro_de_servico::whereIn('id', $idArray)->get();

      $empresa = cadastro_de_empresa::findOrFail($idEmpresa);
      
   
      
      return view('Agedamentos.CadastrarAgentamento',['servico' =>  $servico ,'empresa' => $empresa]);

     
   }
}
