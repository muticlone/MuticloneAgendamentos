<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       
        $Cadastro_empresa = cadastro_de_empresa::all()->reverse();

       


       
        return view('welcome',['Cadastro_empresa'=>$Cadastro_empresa]);



    }
}
