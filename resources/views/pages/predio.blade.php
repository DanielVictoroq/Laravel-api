@extends('layouts.app')

@section('content')

<section class="predio container ">
    <div class="col-md-8 offset-md-2 mt-5 pd-4">
        <div class="d-flex align-items-center justify-content-between">
            <h2>Condomínio {{Session::get('predio')->nome_cond}}</h2> 
            @if(Session::get('dados_login')->id_tipo == 'S')
            <a href="{{route('predioGer')}}" class="btn btn-success">Gerenciar Prédio</a>
            @endif
        </div>
        @if(Session::get('dados_login')->id_tipo == 'S')
        <div class="alert alert-primary col-md-12 mt-5" role="alert">
            Caso o valor de caixa esteja errado ou negativo, insira o valor de caixa <a href="{{route('predioGer')}}" class="">aqui</a>.
        </div>
        @endif
        <div class="alert alert-danger col-md-12  mb-4" role="alert">
            O valor de caixa subtrai automaticamente todo dia 10.
        </div>
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
                    <td>R$ {{number_format($data->vlr_luz, 2 , ',', '.')}}</td>
                    <td>R$ {{number_format($data->vlr_agua, 2 , ',', '.')}}</td>
                    <td>R$ {{number_format($data->faxina, 2 , ',', '.')}}</td>
                    <td>R$ {{number_format($data->elevador,2,',','.')}}</td>
                </tr>
            </tbody>
        </table>
        <span class="">Síndico: <strong>{{Session::get('sindico')->nome.' '.Session::get('sindico')->sobrenome}}</strong></span>
        @if(isset($servico))
        <div class="srv-adc mt-5 table-responsive-sm">
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
                        <td>R$ {{number_format($item->vlr_servico, 2 , ',', '.')}}</td>
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
            <p class="d-block">CAIXA - TOTAL A PAGAR</p><span class="text-success">R$ {{number_format($data->vlr_caixa, 2 , ',', '.')}}</span>
        </div>
        <div class="total mt-4 d-flex align-items-center justify-content-between  mb-5">
            <p class="d-block">TOTAL A PAGAR</p><span class="text-danger">R$ {{number_format($data->vlr_total, 2 , ',', '.')}}</span>
        </div>
    </div>
</section>
@endsection