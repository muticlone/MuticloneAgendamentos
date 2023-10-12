<?php

namespace App\Http\Controllers;

use App\Models\produto_favorito;
use App\Models\produtos_favorito;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function meusFavoritosProdutos(){


        /** @var \App\User $user */
        $user = auth()->user();

        $favoritos = $user->produtos_favoritos()->get();

        $idservicos = [];
        foreach($favoritos as $ids){
            $idservicos[]= $ids->idProduto;
        }

        $query = cadastro_de_servico::query();
        $search = request('search');
        if ($search) {

        }

        $servico = $query
        ->leftJoin('avaliacao_produtos', 'cadastro_de_servicos.id', '=', 'avaliacao_produtos.idServicos')
        ->whereIn('cadastro_de_servicos.id', $idservicos)
        ->select('cadastro_de_servicos.*', DB::raw('AVG(avaliacao_produtos.nota) as media'))
        ->groupBy('cadastro_de_servicos.id')
        ->orderByDesc('media')
        ->paginate(20);


        $paginatedItems = new LengthAwarePaginator(
            $servico->items(),
            $servico->total(),
            $servico->perPage(),
            $servico->currentPage(),
            ['path' => route('meusFavoritos.produtos'), 'query' => ['search' => $search]]
        );




        return view('favoritos.MeusfavoritosProduto',compact('servico',  'paginatedItems') );
    }
}
