@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
        <h2>Apartamento <strong>{{$data->n_apt}}</strong></h2>
            <table class="table table-bordered mt-3">
                <thead >
                    <tr class="table-primary">
                        <th scope="col">Medidor Gás</th>
                        <th scope="col">Valor Gás</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->med_gas}}</td>
                        <td>{{$data->vlr_gas}}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Medidor Água</th>
                        <th scope="col">Valor Água</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$data->med_agua}}</td>
                        <td>{{$data->vlr_agua}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="total mt-4 d-flex align-items-center justify-content-between">
                <p>TOTAL</p><span>R$ 250,00</span>
            </div>
        </div>
        <div class="col-md-6  offset-md-1 mt-5">
            <h2>Ocorrências</h2>
            <div class="card bg-danger mt-3">
                <div class="card-header"> <h5 class="mb-0 text-white" >Problema no portão da garagem</h5></div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
            <h2 class="mt-4">Recados</h2>
            <div class="card text-white bg-primary mt-3">
                <div class="card-header"> <h5 class="mb-0 text-white" >Reforma no portão da garagem</h5></div>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
