<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cadastro_de_empresa;

class CadastroEmpresaController extends Controller
{
    public function create(){
        return view('Empresa.CadastroEmpresa');
     
  }

  public function store(Request $request ,cadastro_de_empresa $Cadastro_empresa){
    
    $data = $request->all();

    $existingEmpresa = $Cadastro_empresa->where('cnpj', $data['cnpj'])->first();
    
    if ($existingEmpresa) {
      return redirect()->route('home')->with('msgErro', 'Essa empresa já possui cadastro!');
    }

    $Cadastro_empresa->create($data);

    

    return redirect()->route('home')->with('msg', 'Empresa cadastrada com sucesso!');

    
  }
}
