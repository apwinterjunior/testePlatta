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

    <div class="row">
        <div class="col-lg-12">
            <h3 style="padding-left: 50px;">Ver produtos</h3>
        </div>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <td style="border-top-color: white;">
                <div class="row">
                    <div class="col-lg-3" style="padding-left: 50px;">
                        Nome
                    </div>
                    <div class="col-lg-3">
                        Preço
                    </div>
                    <div class="col-lg-3">
                        Categoria
                    </div>
                    <div class="col-lg-3 pull-righ"></div>
                </div>
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td height="70" style="border-top-color: white; vertical-align: middle;">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading{{$produto->id}}">
                            <div class="row">
                                <div class="col-lg-3" style="padding-left: 50px;">
                                    {{$produto->nome}}
                                </div>
                                <div class="col-lg-3">
                                    {{  'R$ '.number_format($produto->preco, 2, ',', '.') }}
                                </div>
                                <div class="col-lg-3">
                                    {{$produto->categoria}}
                                </div>
                                <div class="col-lg-3 pull-right">

                                    <a id="container" class="icone-list" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$produto->id}}" aria-expanded="true" aria-controls="collapse{{$produto->id}}">
                                        <i id="icon" class="fa fa-angle-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div id="collapse{{$produto->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$produto->id}}">
                            <div class="panel-body">
                                <br />
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div style="text-align:center"><img style="max-height: 235px; max-width: 235px;" src={{asset(''. $produto->imagem)}}></div>
                                    </div>
                                    <div class="col-lg-8">
                                        <h4>Descrição</h4>
                                        {{$produto->descricao}}
                                    </div>
                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            (function(document){
                var div = document.getElementById('container');
                var icon = document.getElementById('icon');
                var open = false;

                div.addEventListener('click', function(){
                    if(open){
                        icon.className = 'fa fa-angle-down';
                    } else{
                        icon.className = 'fa fa-angle-down open';
                    }

                    open = !open;
                });
            })(document);
        });

    </script>

@endsection


@section('menu')

    <div class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"></div>
    <ul class="nav flex-column mb-2 menu-center-side-bar">
        <li class="nav-item">
            <a class="nav-link" href="../produtos/create">
                <span>Cadastrar produto</span>
            </a>

        </li>
        <li class="nav-item">
            <a class="nav-link inline-block-child active" href="./">
                <span style="text-decoration: underline;color: #4c93ff;">Ver produto</span>
            </a>

            <a class="inline-block-child pull-right">
                <span style="font-size: 22px; color: #4c93ff;font-weight: bold;">|</span>
            </a>
        </li>
    </ul>

@endsection