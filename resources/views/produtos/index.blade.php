@extends('layouts.app_menu')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Preço</td>
                <td>Categoria</td>
                <td colspan="2">Ação</td>
            </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->categoria}}</td>
                    <td><a href="{{ route('produtos.edit',$produto->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection


@section('menu')
    <li class="nav-item">
        <a class="nav-link" href="../produtos/create">
            Cadastrar produto
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="./">
            Ver produtos
        </a>
    </li>
@endsection