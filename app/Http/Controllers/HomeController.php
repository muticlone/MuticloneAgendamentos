<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;






use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {



        $search = request('search');


        if ($search) {

            $Cadastro_empresa = cadastro_de_empresa::where(function ($query) use ($search) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                    ->orWhere('nomeFantasia', 'like', '%' . $search . '%')
                    ->orWhere('area_atuacao', 'like', '%' . $search . '%');
            })->paginate(10);
        } else {
            // $Cadastro_empresa = cadastro_de_empresa::all()->reverse();
            $Cadastro_empresa = cadastro_de_empresa::paginate(10);
        }



        return view('welcome', ['Cadastro_empresa' => $Cadastro_empresa, 'search' => $search]);
    }

    public function showServicos()
    {
        $search = request('search');

        $query = cadastro_de_servico::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomeServico', 'like', '%' . $search . '%')
                    ->orWhere('descricaosevico', 'like', '%' . $search . '%');
            });
        }

        $servico = $query->paginate(10);

        $paginatedItems = new LengthAwarePaginator(
            $servico->items(),
            $servico->total(),
            $servico->perPage(),
            $servico->currentPage(),
            ['path' => route('home.servicos'), 'query' => ['search' => $search]]
        );

        return view('Empresa.homeservicos', compact('search', 'paginatedItems', 'servico'));
    }




    public function show($id)
    {


        $empresa = cadastro_de_empresa::findOrfail($id);

        $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $id)->get();




        $Admempresa = User::where('id', $empresa->user_id)->first()->toArray();

        return view('Empresa.DadosEmpresa', ['empresa' => $empresa, 'Admempresa' =>  $Admempresa, 'servico' => $servico]);
    }

    public function dashboard()
    {


        $user = auth()->user();



        



       
       
        $empresa = $user->empresas()->paginate(10);

        return view('dashboard', ['empresa' => $empresa]);
    }
}
