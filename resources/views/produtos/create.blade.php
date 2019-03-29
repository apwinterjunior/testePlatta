@extends('layouts.app_menu')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    {{--<div class="card uper">--}}
        {{--<div class="card-header">--}}
            {{--Cadastro produto--}}
        {{--</div>--}}
        {{--<div class="card-body">--}}
            {{----}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col-lg-12">
            <h3 style="padding-left: 50px;">Cadastro produto</h3>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <div class="col-lg-12" style="padding-left: 50px;">
        <form method="post" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-11">
                    @csrf
                    <label for="nome">Nome do produto</label>
                    <input type="text" class="form-control form-control-lg" name="nome"/>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-5">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control form-control-lg" name="preco"/>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <label for="categoria">Categoria</label>
                    <select class="form-control form-control-lg" id="categoria" name="categoria">
                        <option>Eletrônico</option>
                        <option>Esporte</option>
                        <option>Música</option>
                        <option>Transporte</option>
                    </select>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-11">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control form-control-lg" name="descricao"/>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-5">
                    <label for="imagem">Imagem</label>
                    <input type="file" class="form-control form-control-lg" accept="image/x-png,image/jpeg" name="imagem" size="60"/>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-lg-11">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>

        </form>
    </div>

@endsection


@section('menu')
    <div class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"></div>
    <ul class="nav flex-column mb-2 menu-center-side-bar">
        <li class="nav-item">
            <a class="nav-link inline-block-child active" href="../produtos/create">
                <span style="text-decoration: underline;color: #f5ad29;">Cadastrar produto</span>
            </a>
            <a class="inline-block-child pull-right">
                <span style="font-size: 22px; color: #f5ad29;font-weight: bold;">|</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./">
                Ver produto
            </a>
        </li>
    </ul>
@endsection