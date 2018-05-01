@extends('layouts.base')


@section('content')
    <!-- Page Heading -->
    <div id="titulo_principal">
        <h1 class="my-4" style="text-align:center;">Aplicación para el ciudadano</h1> 
    </div>
    <div id="titulo_secundario">
        <h2 class="my-4" style="text-align:center;">¿Qué desea Registrar?</h2> 
    </div>
    <div id="eventos">
        <h2 class="my-4">Eventos</h2> 
        <div class="row justify-content-center">
        @for ($i = 0; $i < 2; $i++)  <!-- Leeme: aca iria i<5 harcodeado pq en modelo Categoria deberia ir que tipo es. -->
            <div id="estadio_objeto_{{$i}}" class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{$categorias[$i]->icono}}" alt=""></a>
                    <p class="card-title">
                        <a href="#" style="color:black;font-weight: bold;"><center>{{$categorias[$i]->nombre}}</center></a>
                    </p>
                </div>
            </div>
        @endfor 
        </div>
        <!-- /.row -->
    </div>

    <div id="estadoobjetos">
        <h2 class="my-4">Estado de Objetos</h2> 
        <div class="row justify-content-center">
        @for ($i = 2; $i < 4; $i++)
            <div id="evento_{{$i}}" class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{$categorias[$i]->icono}}" alt=""></a>
                    <p class="card-title">
                        <a href="#" style="color:black;font-weight: bold;"><center>{{$categorias[$i]->nombre}}</center></a>
                    </p>
                </div>
            </div>
        @endfor
        </div>
        <!-- /.row -->
    </div>
@endsection
            