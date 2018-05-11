@extends('layouts.base')

@section('content')
    <div id="formulario-evento">
    {{ Form::model($evento, ['action' => 'EventoController@store']) }}
        <div class="form-group">
            {{ Form::label('categoria', 'Categoría') }}
            {{ Form::text('categoria', $categoria->nombre, ['readonly','class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion', 'Descripción') }}
            {{ Form::textarea('descripcion', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_ocurrencia', 'Fecha de Ocurrencia') }}
            <input type="datetime-local" name="fecha_ocurrencia" class='form-control' value="2018-06-01T08:30">
        </div>
        <div class="form-group">
            {{ Form::label('denunciante', 'Denunciante') }}
            {{ Form::text('denunciante', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::hidden('latitud', 'Latitud', ['id'=>'lat']) }}
            {{ Form::hidden('longitud', 'Longitud', ['id'=>'long']) }}
            {{ Form::hidden('tipo', 1, ['id'=>'tipo']) }}
        </div>
        <div id="map" class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="border:groove;margin-bottom:10px;">    
        </div>
        <button class="btn btn-success" type="submit">Subir un Evento!</button>
    {{ Form::close() }}
    </div>

    <script src={{ asset("js/jquery-3.3.1.min.js") }}></script>
    <script async defer src={{ asset("js/gmaps.js") }} onload="ver_mapa()"></script>
    <script src={{ asset("js/mapa.js")}}></script>
    <script>
        var map;
        var markers;
        $(function() {
            map = new GMaps({
                div: '#map',
                lat: -43.2489500,
                lng: -65.3050500,
                click: function(event) {
                    alert( "Latitud: "+event.latLng.lat()+" "+", longitud: "+event.latLng.lng() );  
                    $('#lat').val(event.latLng.lat());
                    $('#long').val(event.latLng.lng());
                }
            });
        });
    </script>
@endsection
