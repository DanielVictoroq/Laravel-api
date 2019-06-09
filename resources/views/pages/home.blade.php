
@extends('layouts.app')

@section('content')

<div class="container mb-auto">
    <div class="row justify-content-center">
    <h1 class="col-md-12 text-center mt-4 mb-4">Condomínio {{Session::get('predio')->nome_cond}}</h1>
        <div class="col-md-5 mt-5">
            <h2>Detalhes <strong class="float-right">Apt {{$data->n_apt}}</strong></h2>
            <table class="table table-bordered mt-3">
                <thead >
                    <tr class="table-primary">
                        <th scope="col">Medidor Gás</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->med_gas}}</td>
                        <td>R$ {{number_format($data->vlr_gas,2,',','.')}}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Medidor Água</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->med_agua}}</td>
                        <td>R$ {{number_format($data->vlr_agua,2,',','.')}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="condominio mt-4 d-flex align-items-center justify-content-between">
                <p>Condomínio</p><span>R$ {{number_format(Session::get('predio')->valor_cond,2,',','.')}}</span>
            </div>
            <div class="total mt-4 d-flex align-items-center justify-content-between">
                <p class="d-block">TOTAL A PAGAR</p><span class="text-danger">R$ {{number_format($data->vlr_total,2,',','.')}}</span>
            </div>
        </div>
        <div class="col-md-6  offset-md-1 mt-5">
            <h2>Ocorrências</h2>
            @if(Session::get('ocorrencias'))
            @foreach(Session::get('ocorrencias') as $item)
            <div class="card bg-danger mt-3">
                <input hidden type="text" value="{{$item->id_ocorrencia}}">
                <div class="card-header"> <h5 class="mb-0 text-white" >{{$item->titulo}}</h5></div>
                <div class="card-body">
                    <p class="card-text">{{$item->ocorrencia}}</p>
                </div>
            </div>
            @endforeach
            @else
            <div class="nenhuma mt-3">
                <h5 class="mb-0" >Nenhuma Ocorrência</h5>
            </div>
            @endif
            <h2 class="mt-4">Recados</h2>
            @if(Session::get('recados'))
            @foreach(Session::get('recados') as $item)
            <div class="card text-white bg-primary mt-3">
                <div class="card-header"> <h5 class="mb-0 text-white" >{{$item->titulo}}</h5></div>
                <div class="card-body">
                    <p class="card-text">{{$item->comunicado}}</p>
                </div>
            </div>
            @endforeach
            @else
            <div class="nenhuma mt-3">
                <h5 class="card-text">Nenhum recado</h5>
            </div>
            
            @endif
        </div>
    </div>
</div>
@endsection
