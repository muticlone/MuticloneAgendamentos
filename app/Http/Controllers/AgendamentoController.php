<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\cadastro_de_servico;
use App\Models\cadastro_de_empresa;

class AgendamentoController extends Controller


{



   public function create(Request $request)
   {

      $idEmpresa =  $request->input('idempresa');

      $id = $request->input('servico');

      $idArray = array_keys($id);

      $servico = cadastro_de_servico::whereIn('id', $idArray)->get();

      $empresa = cadastro_de_empresa::findOrFail($idEmpresa);



      return view(
         'Agedamentos.CadastrarAgentamento',
         [
            'servico' =>  $servico, 'empresa' => $empresa,

         ]
      );
   }


   public function store(Request $request)
   {


      $data = $request->all(); // dados da pagina
      $idEmpresa =  $request->input('empresaid'); // id da empresa para fazer a busca
      $empresa = cadastro_de_empresa::findOrFail($idEmpresa); // busca dados empresa
      $servico = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)->get(); // busca dados serviços

      $empresaId = $idEmpresa;
      $empresa = cadastro_de_empresa::find($empresaId);

      if (!$empresa) {
         return redirect('/')->with('msgErro', 'Empresa não encontrada');
      }

      // Dados da requisição
      $valorDoProdutoRequest = $request->input('valorUnitatio');
      $valorTotalProdutoRequest = $request->input('valorTotal');
      $NomeDoProdutoRequest = $request->input('nomeServiçoAgendamento');
      $descricaoDoProdutoRequest = $request->input('descricaoservicoAgendamento');
      $duracaohorasDoProdutoRequest = $request->input('duracaohorasAgendamento');
      $duracaoMinutosDoProdutoRequest = $request->input('duracaominutosAgendamento');
      $formadepagamentoRequest = $request->input('formaDepagamento');



      // Dados do banco de dados
      $valorDoProdutoBD = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)->pluck('valorDoServico')->toArray();
      $NOmeDoProdutoBD = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)->pluck('nomeServico')->toArray();
      $NOmeDoProdutoBD = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)->pluck('nomeServico')->toArray();
      $descricaoDoProdutoBD = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)->pluck('descricaosevico')->toArray();
      $duracaohorasDoProdutoBD = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)->pluck('duracaohoras')->toArray();
      $duracaoMinutosDoProdutoBD = cadastro_de_servico::where('cadastro_de_empresas_id', $idEmpresa)->pluck('duracaominutos')->toArray();
      $formadepagamentoBD = cadastro_de_empresa::where('id', $idEmpresa)->pluck('formaDePagamento')->toArray();





      $total = 0;

      // Loop para somar valor total do carrinho
      foreach ($valorDoProdutoBD as $valor) {
         $total += $valor;
      }
      // contagem de elemetos para saber e o pedido tem 1 produto ou mais
      $quantidadeElementos = count($valorDoProdutoRequest);


      // Acessar o primeiro elemento do array
      $formadepagamentoBD = count($formadepagamentoBD) > 0 ? $formadepagamentoBD[0] : [];

      // Validação se há pelo menos um elemento igual entre os arrays
      $arraysIguaisValorDoProduto = !empty(array_intersect($valorDoProdutoBD, $valorDoProdutoRequest));
      $arraysIguaisNomeDoProduto = !empty(array_intersect($NOmeDoProdutoBD, $NomeDoProdutoRequest));
      $arraysIguaisDescricaoDoProduto = !empty(array_intersect($descricaoDoProdutoBD, $descricaoDoProdutoRequest));
      $arraysIguaisHorasDoProduto = !empty(array_intersect($duracaohorasDoProdutoBD, $duracaohorasDoProdutoRequest));
      $arraysIguaisMinutosDoProduto = !empty(array_intersect($duracaoMinutosDoProdutoBD, $duracaoMinutosDoProdutoRequest));




      if ($quantidadeElementos <= 1) {
         $total = $valorDoProdutoRequest[0];
      }

      if (
         $arraysIguaisValorDoProduto &&
         $arraysIguaisNomeDoProduto &&
         $arraysIguaisDescricaoDoProduto &&
         $arraysIguaisHorasDoProduto &&
         $arraysIguaisMinutosDoProduto &&
         $valorTotalProdutoRequest == $total &&
         in_array($formadepagamentoRequest, $formadepagamentoBD)
      ) {
         dd($data);
      } else {

         return redirect('/')->with('msgErro', 'Dados modificados de forma não permitida faça o agendamento novamente');
      }
   }
}
