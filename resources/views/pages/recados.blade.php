@extends('layouts.app')

@section('content')
<section class="container">
    
    <h1 class="text-center mt-5">Administração de Recados</h1>
    
    <div class="col-md-6 float-left recado_div">
        <table class="table table-bordered ">
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
                <tr  class="text-center">
                    <th scope="row" >{{$item->titulo}}</th>
                    <td>{{$item->comunicado}}</td>
                    <td ><i class="far fa-trash-alt fa-2x exc-recado"></i></td>
                </tr>
                @endforeach
                @else
                <div class="nenhuma mt-3">
                    <h5 class="card-text">Nenhum recado</h5>
                </div>   
                @endif
            </tbody>
        </table>
    </div>
    <div class="offset-md-1 col-md-5 recado_div float-left">
        <h2>Novo Recado</h2>
        <form id="formRecado" class="mt-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Titulo</label>
                <input type="text" class="form-control" id="titulorecado"  placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Recado</label>
                <textarea class="form-control" id="recado" placeholder="Recado"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Concluir Recado</button>
        </form>
    </div>
</section>
@endsection