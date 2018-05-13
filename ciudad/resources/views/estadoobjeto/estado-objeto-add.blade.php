@extends('layouts.base')

@section('content')
    <div id="formulario-estado-objeto">
    {{ Form::model($estado_objeto, ['action' => 'EstadoObjetoController@store']) }}
        <div class="form-group">
        {{ Form::label('categoria', 'Categoría') }}
        {{ Form::text('categoria', $categoria->nombre, ['readonly','class' => 'form-control']) }}
        </div>
        <div class="form-group">
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
        {{ Form::label('denunciante', 'Número de Contacto') }}
        {{ Form::text('denunciante', '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::hidden('latitud', 'Latitud', ['id'=>'lat']) }}
            {{ Form::hidden('longitud', 'Longitud', ['id'=>'long']) }}
            {{ Form::hidden('tipo', 2, ['id'=>'tipo']) }}
        </div>
        <div id="map" class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="border:groove;margin-bottom:10px;">    
        </div><input class="btn btn-info" type="button" value="Ubicación Actual" onclick="posicion_actual()"/>
        <br>
        <br>
        <button class="btn btn-success" type="submit">Subir un Estado de un Objeto!</button>
    {{ Form::close() }}
    </div>

    <script src={{ asset("js/jquery-3.3.1.min.js") }}></script>
    
    <script>
        var map;
        var markers;
        $(function() {
            ver_mapa();
            //agregarMarkersTodos();
        });
        
        function ver_mapa(){
            map = new GMaps({
                div: '#map',
                lat: -43.253203,
                lng: -65.309628,
                click: function(event) {
                    map.removeMarkers()
                    map.addMarker({
                        lat: event.latLng.lat(),
                        lng: event.latLng.lng(),
                        title: 'Evento Nuevo',
                        click: function(e) {}
                    });
                    $('#lat').val(event.latLng.lat());
                    $('#long').val(event.latLng.lng());
                }
            });
        }
        function posicion_actual(){
            GMaps.geolocate({
                success: function(position) {
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                    map.addMarker({
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                        title: 'Evento Nuevo',
                        click: function(e) {}
                    });
                    $('#lat').val(position.coords.latitiude);
                    $('#long').val(position.coords.longitude);
                },
                error: function(error) {
                    alert('Geolocation failed: '+error.message);
                },
                not_supported: function() {
                    alert("Your browser does not support geolocation");
                }
            })
        }


    </script>
@endsection