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
        <button class="btn btn-success" type="submit">Subir un Evento!</button>
    {{ Form::close() }}
    <div class="form-grouo">
        <input type="text" id="address" name="address">
    </div>
    <div id="map" class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="border:groove;margin-bottom:10px;">
            
    </div>

    </div>

    <script src={{ asset("js/jquery-3.3.1.min.js") }}></script>
    <script async defer src={{ asset("js/gmaps.js") }} onload="ver_mapa()"></script>
    <script src={{ asset("js/mapa.js")}}></script>
    <script>
        var map;
        $(function() {
            map = new GMaps({
                div: '#map',
                lat: -12.043333,
                lng: -77.028333,
            });
        });
        $("#address").change(function(){
            GMaps.geocode({
                address: $('#address').val(),
                callback: function(results, status) {
                    console.log("status = " + status);
                    console.log("results = " + results);
                    if (status == 'OK') {
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng.lat(), latlng.lng());
                    map.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng()
                    });
                    }
                }
            });
        });
    </script>
@endsection
