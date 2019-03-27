@extends('layouts.app_menu')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Share
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
            <form method="post" action="{{ route('produtos.update', $produto->id) }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    @csrf
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control" name="nome" value={{ $produto->nome }} />
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" name="preco" value={{ $produto->preco }} />
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" name="categoria" value={{ $produto->categoria }} />
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" value={{ $produto->descricao }} />
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem</label>
                    <input type="text" class="form-control" name="imagem" value={{ $produto->imagem }} />
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
@endsection