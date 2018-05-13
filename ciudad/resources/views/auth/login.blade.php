@extends('layouts.base')

@section('content')
<div class"login-body" style="margin-top:80px">
    <form method="POST" action="{{ route('login') }}" class="form-signin">
        <center>
            <img src="img/trelew.png" alt="Smiley face" height="128" width="128"><!---->
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
        </center>
        @csrf
        <div class="form-group">
            <label for="email" class="col-sm-6 col-form-label text-md-right">Dirección de Mail</label>

            <div class="col-md-12">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-6 col-form-label text-md-right">Contraseña</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Ingresar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
