@extends('layouts.app')

@section('content')

<section class="predio container">
    <div class="col-md-8 offset-md-2 mt-5">
        <h2>Condomínio {{Session::get('predio')->nome_cond}}</h2>
        <table class="table table-bordered mt-3">
            <thead >
                <tr class="table-primary">
                    <th scope="col">Valor Luz</th>
                    <th scope="col">Valor Água</th>
                    <th scope="col">Faxina</th>
                    <th scope="col">Elevador</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{number_format($data->vlr_luz, 2 , ',', '.')}}</td>
                    <td>{{number_format($data->vlr_agua, 2 , ',', '.')}}</td>
                    <td>{{number_format($data->faxina, 2 , ',', '.')}}</td>
                    <td>{{number_format($data->elevador,2,',','.')}}</td>
                </tr>
            </tbody>
        </table>
        <span class="">Síndico: <strong>{{Session::get('sindico')->nome.' '.Session::get('sindico')->sobrenome}}</strong></span>
        @if(isset($servico))
        <div class="srv-adc mt-5">
            <h2>Serviços Adicionais</h2>
            <table class="table table-bordered mt-3">
                <thead >
                    <tr class="table-primary">
                        <th scope="col">Servico</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Meio de Pagamento</th>
                    </tr>
                </thead>
                @foreach($servico as $item)
                <tbody>
                    <tr>
                        <td>{{$item->tipo_servico}}</td>
                        <td>{{$item->descricao}}</td>
                        <td>{{number_format($item->vlr_servico, 2 , ',', '.')}}</td>
                        @if($item->meio_pgt == 1)
                        <td>Único</td>
                        @else
                        <td>{{$item->meio_pgt}} vezes</td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        @endif
        <div class="condominio mt-4 d-flex align-items-center justify-content-between">
            <p>Condomínio</p><span>R$ {{number_format($data->valor_cond, 2 , ',', '.')}}</span>
        </div>
        <div class="total mt-4 d-flex align-items-center justify-content-between">
            <p class="d-block">CAIXA</p><span class="text-success">{{$data->vlr_caixa}}</span>
        </div>
        <div class="total mt-4 d-flex align-items-center justify-content-between">
            <p class="d-block">TOTAL</p><span class="text-danger">{{$data->vlr_total}}</span>
        </div>
    </div>
</section>
@endsection