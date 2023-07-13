@extends('Layout.main')
@section('logo','logo_empresa.png')
@section('title','Dashboard')

@section('conteudo')

@if(count($empresa)>0)
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Suas empresa</th>
       
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($empresa as $empresa)

        
            
       
      <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td> 
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="/empresas/dados/{{$empresa->id}}">{{$empresa->nomeFantasia}}
            </div>
           
        
        </td>
       
        <td>
            <a href="/dashboard/edit/{{$empresa->id}}" class="btn btn-sm btn-warning">Editar</a>
            <a href="/cadastro/servicos" class="btn btn-sm btn-info">Criar um serviço</a>
        </td>
      </tr>
      
     
      @endforeach
    </tbody>
  </table>
@else
<div class="alert alert-warning pt-2" role="alert">
    Voce não tem empresas cadastradas <a href="{{route('pag.cadastrar.Empresa');}}">Cadastrar uma empresa</a>
</div>
@endif




    






@endsection