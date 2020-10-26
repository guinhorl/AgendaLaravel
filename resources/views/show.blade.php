@extends('templates.template')

@section('content')

    <div class="text-center">
        <h1>Visualizar</h1>
        <hr/>
    </div>

    <div class="col-md-8 m-auto">
        @php
        $user = $book->find($book->id)->relUsers;
        @endphp
        Título: {{$book->title}} <br>
        Páginas: {{$book->pages}} <br>
        Preço: R$: {{$book->price}} <br>
        Autor: {{$user->name}} <br>
        E-mail: {{$user->email}} <br>

    </div>
    <div class="text-center">
        <a href="{{url('/books')}}" >
            <button class="btn btn-secondary"> Voltar </button>
        </a>
    </div>

@endsection
