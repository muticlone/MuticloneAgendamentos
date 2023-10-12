<?php

namespace App\Http\Controllers;

use App\Models\produto_favorito;
use App\Models\produtos_favorito;
use Illuminate\Http\Request;

class favoritosController extends Controller
{
    public function createfavoritoproduto(){

        $favorito = intval(request('favoritos'));
        $idservico = decrypt(request('idservico'));

        $user = auth()->user();

        $iduser=$user->id;



        $produtoFavorito = new produtos_favorito();
        $produtoFavorito->favoritoProtudo =   $favorito;
        $produtoFavorito->idUsuario =   $iduser;
        $produtoFavorito->idProduto =  $idservico;


        $produtoFavorito->save();

        return back();

    }

    public function dropfavoritoproduto(){

        $idservico = decrypt(request('idservico'));

        $user = auth()->user();

        $iduser=$user->id;



        produtos_favorito::where('idUsuario' , $iduser)->where('idProduto',$idservico)->delete();
        return back();

    }
}
