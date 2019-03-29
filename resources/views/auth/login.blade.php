@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 90px;">
        <div class="col-md-8">


            <div class="row justify-content-center">
                <h3>Entrar</h3>
            </div>

            <form method="POST" action="{{ route('login') }}" style="padding-top: 55px;">
                @csrf

                <div class="form-group row justify-content-center">
                    <div class="col-md-6">
                        <input id="email" placeholder="Email" type="email" class="form-control-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-center">

                    <div class="col-md-6">
                        <input id="password" placeholder="Senha" type="password" class="form-control-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group row justify-content-center" style="padding-top: 30px;">
                    <button type="submit" class="btn btn-lg btn-login">
                        Entrar
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>

@endsection
