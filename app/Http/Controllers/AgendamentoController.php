<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;

class AgendamentoController extends Controller


{



   public function create(Request $request)
   {

      $user = auth()->user();


      $idEmpresa =  $request->input('idempresa');

      $id = $request->input('servico');

      $idArray = array_keys($id);

      $servico = cadastro_de_servico::whereIn('id', $idArray)->get();

      $empresa = cadastro_de_empresa::findOrFail($idEmpresa);



      return view(
         'Agedamentos.CadastrarAgentamento',
         [
            'servico' =>  $servico, 'empresa' => $empresa,
            'user' =>  $user
         ]
      );
   }


   public function store(Request $request)
   {
      $user = auth()->user();
      dd($user);



      $data = $request->all(); // dados da pagina

      $idservico = $request->input('idServiçoAgendamento');
      $idEmpresa =  $request->input('empresaid'); // id da empresa para fazer a busca
      $empresa = cadastro_de_empresa::findOrFail($idEmpresa); // busca dados empresa

      $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)
         ->whereIn('id',  $idservico)
         ->get();

      // Dados da requisição
      $NomeDoProdutoRequest = $request->input('nomeServiçoAgendamento');
      $valorDoProdutoRequest = $request->input('valorUnitatio');
      $valorTotalProdutoRequest = $request->input('valorTotal');
      $valorTotalProdutoRequestFloat = floatval($valorTotalProdutoRequest);
      $duracaohorasDoProdutoRequest = $request->input('duracaohorasAgendamento');
      $duracaoMinutosDoProdutoRequest = $request->input('duracaominutosAgendamento');
      $formadepagamentoRequest = $request->input('formaDepagamento');
      $formaDePagamentoArray = array($formadepagamentoRequest);
    

      // dados bd
      $servicoNome = $servico->pluck('nomeServico')->toArray();
      $servicoValordoPRoduto = $servico->pluck('valorDoServico')->toArray();
      $totalbd = array_sum($servicoValordoPRoduto);
      $servicoduracaohorasDoProduto = $servico->pluck('duracaohoras')->toArray();
      $servicoduracaoMinutosDoProduto = $servico->pluck('duracaominutos')->toArray();
      $empresaformadepagamento = $empresa->formaDePagamento;
     




      $comparisonNomeDdComNOmeRequest = array_diff($servicoNome, $NomeDoProdutoRequest);
      $comparasionFormadepagamento = array_intersect($formaDePagamentoArray,  $empresaformadepagamento);



      if (
         $valorTotalProdutoRequestFloat ==  $totalbd && $servicoValordoPRoduto == $valorDoProdutoRequest
         &&  $servicoduracaohorasDoProduto ==  $duracaohorasDoProdutoRequest
         && $servicoduracaoMinutosDoProduto == $duracaoMinutosDoProdutoRequest
         && empty($comparisonNomeDdComNOmeRequest) && $comparasionFormadepagamento

      ) {
         dd($data);
      } else {
         dd("não para algum caso");
      }
   }
}
