<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       
      

        $search = request('search');


        if($search){
            
            $Cadastro_empresa = cadastro_de_empresa::where(function ($query) use ($search) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                      ->orWhere('nomeFantasia', 'like', '%' . $search . '%')
                      ->orWhere('area_atuacao', 'like', '%' . $search . '%');
                     
            })->get();

        }else{
            $Cadastro_empresa = cadastro_de_empresa::all()->reverse();
        }


       
        return view('welcome',['Cadastro_empresa'=>$Cadastro_empresa,'search'=>$search]);



    }

    public function store(){
        return view('Empresa.DadosEmpresa');
    }
}
