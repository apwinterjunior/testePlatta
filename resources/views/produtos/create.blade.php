@extends('layouts.app_menu')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Cadastro produto
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('produtos.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control" name="nome"/>
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco"/>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" name="categoria"/>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao"/>
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="text" class="form-control" name="imagem"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection


@section('menu')
    <li class="nav-item">
        <a class="nav-link active" href="../produtos/create">
            Cadastrar produto
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./">
            Ver produtos
        </a>
    </li>
@endsection