@extends('templates.template')

@section('content')

    <div class="text-center">
        <h1>Crud Laravel</h1>
        <hr/>
    </div>
    <div class="text-center">
        <a href="{{url('books/create')}}">
            <button class="btn btn-success mt-3 mb-4">Cadastrar</button>
        </a>
    </div>
    <div class="col-md-8 m-auto">
        <table class="table table-striped text-center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Preço</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                @php
                $user = $book->find($book->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <a href="{{url("books/$book->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>
                        <a href="">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a href="">
                            <button class="btn btn-danger">Excluir</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
