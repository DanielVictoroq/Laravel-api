@extends('layouts.app')

@section('content')
<section class="container ocorrencias">
    @if(Session::get('dados_login')->id_tipo =='S')
    <h1 class="text-center mt-3">Administração de Ocorrências</h1>
    
    <div class="col-md-8 offset-md-2 mt-5">
        <div class="alert alert-success excl-oc-success" role="alert">
            Ocorrência Excluido com sucesso!
        </div>
        <div class="alert alert-danger excl-oc-danger" role="alert">
            Erro ao excluir ocorrência!
        </div>
        <h2>Ocorrências</h2>
        <table class="table table-bordered mt-4">
            <thead>
                <tr  class="text-center">
                    <th scope="col">Titulo</th>
                    <th scope="col">Recado</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::get('ocorrencias'))
                @foreach(Session::get('ocorrencias') as $item)
                <tr class="text-center">
                    <th scope="row" >{{$item->titulo}}</th>
                    <td>{{$item->ocorrencia}}</td>
                    <td >
                        <form class="exc-recado" action="{{route('postRecados')}}">
                            <button type="submit" class="btn-rec" data-rec="{{$item->id_ocorrencia}}"><i class="far fa-trash-alt fa-2x text-danger"></i></button>
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
    @else
    <h1 class="text-center mt-3">Ocorrências</h1>
    @endif
    
    <div class="col-md-8 offset-md-2 mt-4 float-left">
        <div class="alert alert-success criar-oc-success" role="alert">
            Recado criado com sucesso!
        </div>
        <div class="alert alert-danger criar-oc-danger" role="alert">
            Erro ao criar recado!
        </div>
        <h2>Nova Ocorrencia</h2>
        <form id="formRecado" class="mt-2" method="post">
            <div class="form-group">
                <label for="titulorecado">Titulo</label>
                <input type="text" class="form-control" id="titulorecado" name="titulorecado"  placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="recado">Ocorrência</label>
                <textarea class="form-control" id="recado" name="recado" placeholder="Recado"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Concluir Ocorrência</button>
        </form>
    </div>
    
</section>
@endsection