<?php

namespace App\Http\Controllers;

use App\Models\cadastro_de_empresa;
use App\Models\cadastro_de_servico;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\avaliacao_produto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



use App\Models\User;


class HomeController extends Controller
{


    public function index()
    {



        $search = request('search');


        if ($search) {

            $empresa = cadastro_de_empresa::where(function ($query) use ($search) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                    ->orWhere('nomeFantasia', 'like', '%' . $search . '%')
                    ->orWhere('area_atuacao', 'like', '%' . $search . '%');
            })->get();
        } else {



            $empresa = cadastro_de_empresa::orderBy('id', 'desc')->get();
        }
        $Cadastro_empresa = cadastro_de_empresa::orderBy('id', 'desc')->paginate(20);
        $idis = [];

        foreach ($empresa as  $empresas) {
            $idis[] =  $empresas->id;
        }





        $agendamentos = Agendamento::whereIn('cadastro_de_empresas_id', $idis)
            ->whereNotNull('nota')
            ->whereNotNull('comentario')
            ->get();



        $notasPorEmpresa = [];

        foreach ($agendamentos as $agendamento) {
            $cadastro_de_empresas_id = $agendamento->cadastro_de_empresas_id;
            $nota = $agendamento->nota;

            if (!isset($notasPorEmpresa[$cadastro_de_empresas_id])) {
                $notasPorEmpresa[$cadastro_de_empresas_id] = [];
            }


            $notasPorEmpresa[$cadastro_de_empresas_id][] = $nota;
        }



        $mediaNotasPorEmpresa = [];

        foreach ($notasPorEmpresa as $empresaId => $notasDaEmpresa) {
            if (count($notasDaEmpresa) > 0) {
                $somaNotas = array_sum($notasDaEmpresa);
                $mediaNotas = $somaNotas / count($notasDaEmpresa);
                $mediaNotasPorEmpresa[$empresaId] = $mediaNotas;
            } else {
                // Se a empresa não tiver notas, defina a média como 0 ou outro valor padrão
                $mediaNotasPorEmpresa[$empresaId] = 0;
            }
        }


        // ordenar as empresas pela media das avaliação delas
        $empresasOrdenadas = collect($empresa)->sortByDesc(function ($empr) use ($mediaNotasPorEmpresa) {
            return isset($mediaNotasPorEmpresa[$empr->id]) ? $mediaNotasPorEmpresa[$empr->id] : 0;
        })->values();


        function paginateCollectionWithBaseUrl($items, $perPage = 15, $page = null, $baseUrl = null, $options = [])
        {
            $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
            $items = $items instanceof Collection ? $items : Collection::make($items);

            $paginator = new LengthAwarePaginator(
                array_values($items->forPage($page, $perPage)->toArray()),
                $items->count(),
                $perPage,
                $page,
                $options
            );

            // Defina a URL base para a paginação
            $paginator->setPath($baseUrl);

            return $paginator;
        }

        $empresasOrdenadasPaginadas = paginateCollectionWithBaseUrl($empresasOrdenadas, 50, null, '/home/empresas');





        return view('welcome', [
            'Cadastro_empresa' => $Cadastro_empresa, 'search' => $search,
            'mediaNotasPorEmpresa' =>  $mediaNotasPorEmpresa,
            'empresasOrdenadas' =>  $empresasOrdenadas,
            'empresasOrdenadasPaginadas' =>  $empresasOrdenadasPaginadas

        ]);
    }


    // public function buscaEmpresa(Request $request){
    //     // Obtém o termo de pesquisa da consulta HTTP
    //     $searchTerm = $request->input('search');

    //     // Consulta o banco de dados para encontrar empresas que correspondem ao termo de pesquisa
    //     $empresas = cadastro_de_empresa::where('nome', 'LIKE', '%' . $searchTerm . '%')->get();

    //     return response()->json($empresas);
    // }





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
        $servico = $query
            ->leftJoin('avaliacao_produtos', 'cadastro_de_servicos.id', '=', 'avaliacao_produtos.idServicos')
            ->select('cadastro_de_servicos.*', DB::raw('AVG(avaliacao_produtos.nota) as media'))
            ->groupBy('cadastro_de_servicos.id')
            ->orderByDesc('media')
            ->paginate(20);










        $servicoBusca =  cadastro_de_servico::all();







        $paginatedItems = new LengthAwarePaginator(
            $servico->items(),
            $servico->total(),
            $servico->perPage(),
            $servico->currentPage(),
            ['path' => route('home.servicos'), 'query' => ['search' => $search]]
        );


        return view('Empresa.homeservicos', compact(
            'search',
            'paginatedItems',
            'servico',
            'servicoBusca',



        ));
    }





    public function show($id)
    {



        $empresa = cadastro_de_empresa::findOrfail($id);

        $itensPorPagina = 50;


        $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $id)
            ->orderBy('id', 'desc')
            ->paginate($itensPorPagina);



        $Admempresa = User::where('id', $empresa->user_id)->first()->toArray();






        $agendamentos = Agendamento::where('cadastro_de_empresas_id', $id)
            ->whereNotNull('nota')
            ->whereNotNull('comentario')
            ->whereNotNull('user_id')
            ->orderBy('updated_at', 'desc')
            ->get();



        $notas = $agendamentos->pluck('nota');
        $media = $notas->avg();




        $userAll = User::all();



        return view('Empresa.DadosEmpresa', [
            'empresa' => $empresa,
            'Admempresa' =>  $Admempresa, 'servico' => $servico,

            'media' =>  $media, 'agendamentos' => $agendamentos,
            'nome' =>   $userAll
        ]);
    }










    public function dashboard()
    {
        /** @var \App\User $user */
        $user = auth()->user();
        $search = request('search');

        if ($search) {
            $empresa = cadastro_de_empresa::where(function ($query) use ($search, $user) {
                $query->where('razaoSocial', 'like', '%' . $search . '%')
                    ->orWhere('nomeFantasia', 'like', '%' . $search . '%');
            })
                ->where('user_id', '=', $user->id)
                ->paginate(10);
        } else {
            $empresa = $user->empresas()->paginate(10);
        }

        $ids = [];

        foreach ($empresa as $empresaItem) {

            $ids[] = $empresaItem->id;
        }

        $agendamentos = Agendamento::whereIn('cadastro_de_empresas_id',  $ids)->where('finalizado', 1)->get();
        $temagendamentos = !$agendamentos->isEmpty();

        return view('dashboard', [
            'empresa' => $empresa,

            'search' => $search,
            'temagendamentos' => $temagendamentos
        ]);
    }



    public function categorias()
    {


        return view('busca.buscacategorias');
    }

    public function Showcategorias(Request $request)
    {

        $categoria = $request->input('categoria');
        $nomeDaCategoria = $categoria;

        $empresa = cadastro_de_empresa::where('area_atuacao', $nomeDaCategoria)->get();

        $idsempresa = $empresa->pluck('id')->toArray();



        $servicos = cadastro_de_servico::whereIn('cadastro_de_empresas_id', $idsempresa)->paginate(15);

        //anexando manualmente o categoriaparâmetro aos links de paginação
        $servicos->appends(['categoria' => $nomeDaCategoria]);

        return view('ResuladobuscaCategoria', [
            'servicos' => $servicos,
            'empresa' => $empresa,
            'nomeDaCategoria' => $nomeDaCategoria,
        ]);
    }
}
