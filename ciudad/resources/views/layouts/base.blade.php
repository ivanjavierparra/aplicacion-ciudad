<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Aplicación Ciudad</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href={{ asset("css/bootstrap.min.css") }}>
        <link rel="stylesheet" href={{ asset("css/estilos.css") }}>>
    </head>

    <body>
        @section('navbar')
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src={{ asset("img/trelew.png") }} alt="Smiley face" height="42" width="42"><!---->
                        Aplicación Ciudad
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" onclick="$('#navbarResponsive').toggle();" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href=" {{route('inicio')}}">Inicio
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" {{route('mapas')}}">Ver Aspectos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Opciones
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href=" {{route('login')}}  ">Iniciar Sesión</a>
                                    <a class="dropdown-item" href="#">Cerrar Sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Fin nav -->
        @show
        
        <div class="container">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="py-5 bg-dark" style="margin-top:60px;">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Acosta - Parra 2018</p>
            </div>
            <!-- /.container -->
        </footer>
        <!-- Bootstrap core JavaScript -->
        <script src={{ asset("js/googlemapsapi.js") }}></script>
        <script src={{ asset("js/jquery-3.3.1.min.js") }}></script>
        <script src={{ asset("js/popper.min.js") }}></script>
        <script src={{ asset("js/bootstrap.min.js") }}></script>
        <script src={{ asset("js/app.js") }}></script>
        <!--<script src="http://maps.googleapis.com/"></script>-->
        <!--<script src="js/googlemapsapi.js"></script>   -->
        <!--  LEEEEME     https://developers.google.com/maps/documentation/javascript/tutorial#Loading_the_Maps_API    -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKOnjjR1g8kJjqPEPXN9LjxolFsQS9900"></script>
        <script async defer src={{ asset("js/gmaps.js") }} onload="ver_mapa()"></script>
        <script src={{ asset("js/mapa.js")}}></script>
        <script>
            $(document).ready(function() {
                $(".dropdown-toggle").dropdown();
            });
        </script>
    </body>
</html>