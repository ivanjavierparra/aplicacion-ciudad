@extends('layouts.base')


@section('content')


<div class"login-body" style="margin-top:80px">
    <form class="form-signin">
          <center>
            <img src="img/trelew.png" alt="Smiley face" height="128" width="128"><!---->
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
          </center>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control estilo-email" placeholder="Email" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control estilo-password" placeholder="Password" required>
          <div class="checkbox mb-3" style="font-weight: 400;">
              <label>
              <input type="checkbox" value="remember-me"> Recordarme
              </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Aceptar</button>
          <p class="mt-5 mb-3 text-muted"> </p>
    </form>
</div>

@endsection