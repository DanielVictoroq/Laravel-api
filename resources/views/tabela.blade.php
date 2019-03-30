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
            </tr>
        </thead>

        @foreach ($jobs as $item)
        <tbody>
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->local}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</section>
@endsection