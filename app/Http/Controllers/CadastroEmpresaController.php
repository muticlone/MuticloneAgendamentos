<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cadastro_de_empresa;


class CadastroEmpresaController extends Controller
{
    public function create(){
        return view('Empresa.CadastroEmpresa');
     
  }

  public function store(Request $request, cadastro_de_empresa $Cadastro_empresa){
   
    $data = $request->all();

   

    //img uploud

    if($request ->hasFile('image') && $request->file('image')->isValid()){

        
        $requestImage =  $request->image;

        $extensao = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;

        $requestImage->move(public_path('img/logo_empresas'), $imageName);

        $data['image'] =  $imageName;
    }

    $existingEmpresa = $Cadastro_empresa->where('cnpj', $data['cnpj'])->first();

    if ($existingEmpresa) {
        return redirect()->route('home')->with('msgErro', 'Essa empresa já possui cadastro!');
    }

    $areaAtuacao = $request->input('area_atuacao');

    if ($areaAtuacao === 'Outro') {
        $areaAtuacao = $request->input('outra-area');
    }

    $data['area_atuacao'] = $areaAtuacao;

    $user = auth()->user();
    
    $data['user_id'] = $user->id;

    $Cadastro_empresa->create($data);

    return redirect()->route('home')->with('msg', 'Empresa cadastrada com sucesso!');
}

public function edit($id){
    $user = auth()->user();

    $empresa = cadastro_de_empresa::findOrFail($id);

    

    if($user->id != $empresa->user_id) {
        return redirect('/dashboard');
    }

    return view('Empresa.CadastroEmpresaedit', ['empresa' => $empresa]);

}



}
