@extends('layouts.app')

@section('content')

<section class="container">
    <div class="col-md-12 text-center">
        <h1 class="mt-4">Gerenciamento de Síndico</h1>
        <div class="alert alert-primary col-md-8 mt-5 offset-md-2" role="alert">
            Ao alterar o Síndico você perde automaticamente as permissões de acesso de algumas funcionalidade.
        </div>
        <h4 class="mt-5">Síndico Atual: {{$sindico}}</h4>
        <div class="alert alert-success reg-sindico-success col-md-6 mt-4 offset-md-3" role="alert">
            Síndico alterado com sucesso!
        </div>
        <div class="alert alert-danger reg-sindico-danger col-md-6 mt-4 offset-md-3" role="alert">
            Erro ao alterar Síndico!
        </div>
        <p class="mt-5 mb-3">Definir novo Síndico</p>
        <select name="sindico" id="sindico" class="col-md-4">
            @foreach ($data as $item)
            @if($item->id_tipo != 'S' && $item->id_tipo != 'A' )
            <option value="{{$item->nome_usuario}}">{{$item->nome." ".$item->sobrenome}}</option>
            @endif
            @endforeach
        </select>
        <div class="col-md-3 mt-3 mr-auto ml-auto">
            <button class="btn btn-success col-md-12 concluir-sin">Concluir</button>
        </div>
    </div>
</section>

@endsection