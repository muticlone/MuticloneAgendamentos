<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
   public function create(){
      return view('Agedamentos.CadastrarAgentamento');
   }
}
