@extends('layouts.base')


@section('content')
    <!-- Page Heading -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div id="titulo_principal">
        <h1 class="my-4" style="text-align:center;">Aplicación para el ciudadano</h1> 
    </div>
    <div id="titulo_secundario">
        <h2 class="my-4" style="text-align:center;">¿Qué desea Registrar?</h2> 
    </div>
    <div id="eventos">
        <h2 class="my-4">Eventos</h2> 
        <div class="row justify-content-center">
        @for ($i = 0; $i < count($categorias); $i++) 
            @if($categorias[$i]->tipo === 'evento')
                <div id="estadio_objeto_{{$i}}" class="col-lg-2 col-md-2 col-sm-6 col-xs-6 col-6">
                    <div class="card h-100">
                        <a href={{ URL("evento/crear/{$categorias[$i]->id}") }}><img class="card-img-top" src="{{$categorias[$i]->icono}}" alt=""></a>
                        <p class="card-title">
                            <a href={{ URL("evento/crear/{$categorias[$i]->id}") }} style="color:black;font-weight: bold;"><center>{{$categorias[$i]->nombre}}</center></a>
                        </p>
                    </div>
                </div>
            @endif
        @endfor 
        </div>
        <!-- /.row -->
    </div>

    <div id="estadoobjetos">
        <h2 class="my-4">Estado de Objetos</h2> 
        <div class="row justify-content-center">
        @for ($i = 0; $i < count($categorias); $i++) 
            @if($categorias[$i]->tipo === 'estadoobjeto')
                <div id="evento_{{$i}}" class="col-lg-2 col-md-2 col-sm-6 col-xs-6 col-6">
                    <div class="card h-100">
                        <a href={{ URL("estadoobjeto/crear/{$categorias[$i]->id}") }}><img class="card-img-top" src="{{$categorias[$i]->icono}}" alt=""></a>
                        <p class="card-title">
                            <a href={{ URL("estadoobjeto/crear/{$categorias[$i]->id}") }} style="color:black;font-weight: bold;"><center>{{$categorias[$i]->nombre}}</center></a>
                        </p>
                    </div>
                </div>
            @endif
        @endfor
        </div>
        <!-- /.row -->
    </div>
@endsection
            