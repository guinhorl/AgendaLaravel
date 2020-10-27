@extends('templates.template')

@section('content')

    <div class="text-center">
        <h1>@if(isset($book)) Editar Book @else Cadastrar Book @endif</h1>
        <hr/>
        <div class="text-center mt-3 mb-4">
            <a href="{{url('/books')}}" >
                <button class="btn btn-secondary"> Voltar </button>
            </a>
        </div>
    </div>

    <div class="col-md-8 m-auto border border-dark ">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif
            @if(isset($book))
                <form name="formEditBook" id="formEditBook" method="post" action="{{"/books/$book->id"}}">
                        @method('PUT')
                        @csrf
                    @else
                        <form name="formCadBook" id="formCadBook" method="post" action="{{'/books'}}">
                            @csrf
                            @endif

            <div class="form-group">
                <label for="inputTitulo">Título</label>
                <input type="text" class="form-control" value="{{$book->title ?? ''}}" id="inputTitulo" name="inputTitulo" required>
            </div>
            <div class="form-group">
                <label for="inputPagina">Páginas</label>
                <input type="text" class="form-control" value="{{$book->pages ?? ''}}" id="inputPagina" name="inputPagina" required>
            </div>
            <div class="form-group">
                <label for="inputPreco">Preço</label>
                <input type="text" class="form-control" value="{{$book->price ?? ''}}" id="inputPreco" name="inputPreco" required>
            </div>
            <div class="form-group">
                <label for="inputAutor">Autor</label>
                <select class="custom-select" name="inputAutor" id="inputAutor" required>
                    <option value="{{$book->relUsers->id ?? ''}}">{{$book->relUsers->name ?? 'Selecione'}}</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3 mb-4">@if(isset($book)) Editar @else Enviar @endif</button>
            </div>
        </form>
    </div>
<br>

@endsection
