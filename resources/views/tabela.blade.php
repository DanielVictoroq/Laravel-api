@extends('layouts.app')

@section('content')

<section class="container">
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Local</th>
                <th scope="col">Compania</th>
                <th scope="col">Exluir</th>
            </tr>
        </thead>
        
        @foreach ($jobs as $item)
        <tbody >
            <tr class="tr">
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->local}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$item->company->name}}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item">E-mail: {{$item->company->email}}</a>
                            <a class="dropdown-item">Site:   {{$item->company->website}}</a>
                            <a class="dropdown-item">Logo:   {{$item->company->logo}}</a>
                        </div>
                    </div>
                </td>
                <td>
                    <form action="{{route('excluirJob')}}" method="POST">
                        @csrf
                        <input type="text" name="id" hidden value="{{$item->id}}">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</section>
@endsection