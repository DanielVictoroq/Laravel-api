@extends('layouts.app')

@section('content')
<section class="container jobs">
    <h2>Formulário para criar jobs</h2>
    <form action="{{url('job')}}" method="POST">

        <input hidden type="text" name="_token" value="{{ csrf_token() }}">
        <div><input class="form-control mb-3 mt-5" type="text" name="title" placeholder="Titulo"></div>
        <div><input class="form-control mb-3" type="text" name="description" placeholder="Descrição"></div>
        <div><input class="form-control mb-3" type="text" name="local" placeholder="Local"></div>
        <div><input class="form-control mb-3" type="text" name="remote" placeholder="remote"></div>
        <div><input class="form-control mb-3" type="text" name="type" placeholder="Tipo"></div>
        <div><input class="form-control mb-3" type="text" name="company_id" placeholder="Compania"></div>
        <button type="submit" class="btn btn-success">Confirmar</button>
    </form>
</section>

@endsection