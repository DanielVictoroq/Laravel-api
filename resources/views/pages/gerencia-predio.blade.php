@extends('layouts.app')

@section('content')
<section class="container gerencia-pred text-center">
    <h1 class="mt-5">Gerência do Prédio {{Session::get('predio')->nome_cond}}</h1>
    
    <form id="formPredio" method="POST" class="mt-5" action="{{route('alteracoesPredio')}}">
        @csrf
        <div class="d-flex align-items-center input-cad ">
            <label for="condominio">Valor Condomínio R$</label>
            <input type="text" name="condominio" id = "condominio" class="form-control mb-2" placeholder="Valor Condomínio" value="{{number_format(Session::get('predio')->valor_cond,2,',','.')}}">
        </div>
        <div class="d-flex align-items-center input-cad">
            <label for="agua">Valor Água R$</label>
            <input type="text" name="agua" id = "agua" class="form-control mb-2"  placeholder="Água" value="{{number_format(Session::get('predio')->vlr_agua,2,',','.')}}">
        </div>
        <div class="d-flex align-items-center input-cad">
            <label for="luz">Valor Luz R$</label>
            <input type="text" name="luz" id = "luz" class="form-control mb-2" placeholder="Luz" value="{{number_format(Session::get('predio')->vlr_luz,2,',','.')}}">
        </div>
        <div class="d-flex align-items-center input-cad">
            <label for="faxina">Faxina R$</label>
            <input type="text" name="faxina" id = "faxina" class="form-control mb-2" placeholder="Faxina" value="{{number_format(Session::get('predio')->faxina,2,',','.')}}">
        </div>
        <div class="d-flex align-items-center input-cad">
            <label for="elevador">Elevador R$</label>
            <input type="text" name="elevador" id = "elevador" class="form-control mb-2" placeholder="Elevador" value="{{number_format(Session::get('predio')->elevador,2,',','.')}}">
        </div>
        <div class="d-flex align-items-center input-cad">
            <label for="caixa">Caixa R$</label>
            <input type="text" name="caixa" id = "caixa" class="form-control mb-2" placeholder="Caixa" value="{{number_format(Session::get('predio')->vlr_caixa,2,',','.')}}">
        </div>
        <button class = "btn btn-success mt-4 col-md-4 " type="submit">Registrar Mudanças</button>
    </form>
    
</section>
@endsection