@extends('layouts.app')

@section('content')
<section class="container">
    
    <h1 class="text-center mt-5">Administração de Recados</h1>
    
    <div class="col-md-6 float-left recado_div">
        <div class="alert alert-success excl-recado-success" role="alert">
            Recado Excluido com sucesso!
        </div>
        <div class="alert alert-danger excl-recado-danger" role="alert">
            Erro ao excluir recado!
        </div>
        <h2>Recados</h2>
        <table class="table table-bordered mt-4">
            <thead>
                <tr  class="text-center">
                    <th scope="col">Titulo</th>
                    <th scope="col">Recado</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::get('recados'))
                @foreach(Session::get('recados') as $item)
                <tr class="text-center">
                    <th scope="row" >{{$item->titulo}}</th>
                    <td>{{$item->comunicado}}</td>
                    <td >
                        <form class="exc-recado" action="{{route('postRecados')}}">
                            <button type="submit" class="btn-rec" data-rec="{{$item->id_comunicado}}"><i class="far fa-trash-alt fa-2x text-danger"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="table-empty text-center">
                    <td colspan="3">Nenhum Recado</td>
                    
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    
    <div class="offset-md-1 col-md-5 recado_div float-left">
        <div class="alert alert-success criar-recado-success" role="alert">
            Recado criado com sucesso!
        </div>
        <div class="alert alert-danger criar-recado-danger" role="alert">
            Erro ao criar recado!
        </div>
        <h2>Novo Recado</h2>
        <form id="formRecado" class="mt-4" method="post">
            <div class="form-group">
                <label for="titulorecado">Titulo</label>
                <input type="text" class="form-control" id="titulorecado" name="titulorecado"  placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="recado">Recado</label>
                <textarea class="form-control" id="recado" name="recado" placeholder="Recado"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Concluir Recado</button>
        </form>
    </div>
</section>
@endsection