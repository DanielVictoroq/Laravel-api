@extends('layouts.app')

@section('content')

<section class="container">
    <div class="col-md-12 text-center">
        
        <h2>Síndico Atual: {{$sindico}}</h2>
        
        <h2 class="mt-5 mb-3">Definir novo Síndico</h2>
        <select name="sindico" id="sindico">
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