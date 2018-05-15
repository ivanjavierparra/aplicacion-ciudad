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
        {{ Form::text('denunciante', '', ['class' => 'form-control','required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::hidden('latitud', 'Latitud', ['id'=>'lat','required' => 'required']) }}
            {{ Form::hidden('longitud', 'Longitud', ['id'=>'long','required' => 'required']) }}
            {{ Form::hidden('tipo', 2, ['id'=>'tipo']) }}
        </div>
        <span id="direccion" style="color:black"></span><br>
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
        
        function reverse_geocoding(selec,lat,lon){
            var latlng = new google.maps.LatLng(lat, lon);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status !== google.maps.GeocoderStatus.OK) {
                    alert(status);
                }
                // This is checking to see if the Geoeode Status is OK before proceeding
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results);
                    var address = (results[0].formatted_address);
                    console.log(address);
                    $(selec).text(address);
                }
            });
        }

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
                    var select = "#direccion";
                    reverse_geocoding(select,event.latLng.lat(),event.latLng.lng());
                }
            });
            agregarMarkersTodos();
        }
        function posicion_actual(){
            map.removeMarkers();
            agregarMarkersTodos();
            GMaps.geolocate({
                success: function(position) {
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                    /*map.addMarker({
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                        title: 'Evento Nuevo',
                        click: function(e) {}
                    });*/
                    $('#lat').val(position.coords.latitude);
                    $('#long').val(position.coords.longitude);
                    var select = "#direccion";
                    reverse_geocoding(select,position.coords.latitude,position.coords.longitude);
                },
                error: function(error) {
                    alert('Geolocation failed: '+error.message);
                },
                not_supported: function() {
                    alert("Your browser does not support geolocation");
                }
            })
        }

        /* Si recibe true, significa que fue invocada por el filtro, entonces muestra en el mapa solo los eventos */
            /* de lo contrario, si es false, al mapa le agrego los eventos y  no elimino ningun marker */
            function agregarMarkersEventos(){
                var markers_data = [];
                
                @foreach($eventos as $evento)
                        @foreach($categorias as $cat)
                            @if($cat->id === $evento->categoria_id)
                                var icon = {
                                    url: '{{ asset("$cat->icono") }}', // url
                                    scaledSize: new google.maps.Size(32, 32), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                                markers_data.push({
                                    lat : '{{$evento->latitud}}',
                                    lng :'{{$evento->longitud}}',
                                    title : "{{$cat->nombre}}",
                                    infoWindow: {
                                        content: `<div> 
                                                    <b> Descripción: </b> {{$evento->descripcion}}  <br> 
                                                    <b> Fecha de Ocurrencia: </b> {{date_create($evento->fecha_ocurrencia)->format('d-m-Y H:i:s')}} <br>  
                                                    <b> Dirección: </b> <span id="span-evento-{{$evento->id}}"></span> <br>
                                                    <b> Fecha en que fue registrado en el Sistema: </b> {{$evento->created_at->format('d-m-Y H:i:s')}} <br>
                                                </div>`  
                                    },
                                    icon : icon,
                                    click: function(e) {
                                        reverse_geocoding("#span-evento-{{$evento->id}}",{{$evento->latitud}},{{$evento->longitud}});
                                    }
                                });
                                @break
                            @endif
                        @endforeach
                @endforeach

                map.addMarkers(markers_data);
                
            }


            /* Si recibe true, significa que fue invocada por el filtro, entonces muestra en el mapa solo los estados */
            /* de lo contrario, si es false, al mapa le agrego los estados y  no elimino ningun marker de evento */
            function agregarMarkersEstados(){
                var markers_data = [];
                
                
                @foreach($estados as $estado)
                
                        @foreach($categorias as $cat)
                            @if($cat->id === $estado->categoria_id)
                                var icon = {
                                    url: '{{ asset("$cat->icono") }}', // url
                                    scaledSize: new google.maps.Size(32, 32), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                                markers_data.push({
                                    lat : '{{$estado->latitud}}',
                                    lng :'{{$estado->longitud}}',
                                    title : "{{$cat->nombre}}",
                                    infoWindow: {
                                        content: `<div> 
                                                    <b> Descripción: </b>  {{$estado->descripcion}} <br> 
                                                    <b> Fecha en que Sucedió: </b> {{date_create($estado->fecha)->format('d-m-Y H:i:s')}} <br>  
                                                    <b> Dirección: </b> <span id="span-estado-{{$estado->id}}"></span> <br>
                                                    <b> Fecha en que fue registrado en el Sistema: </b> {{$estado->created_at->format('d-m-Y H:i:s')}} <br>
                                                    <b> Solucionado: </b> @if($estado->solucionado === 0)
                                                                        No
                                                                    @else
                                                                        Si
                                                                    @endif
                                                </div>`  
                                    },
                                    icon : icon,
                                    click: function(e) {
                                        reverse_geocoding("#span-estado-{{$estado->id}}",{{$estado->latitud}},{{$estado->longitud}});
                                    }
                                });
                                @break
                            @endif
                        @endforeach

                @endforeach

                map.addMarkers(markers_data);
                
            }


            function agregarMarkersUbicacionActual(){
                GMaps.geolocate({
                    success: function(position) {
                        var markers_data = [];
                        var icon = {
                                    url: '{{ asset("img/homero.png") }}', // url
                                    scaledSize: new google.maps.Size(32, 32), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                                markers_data.push({
                                    id : '#span-yo-1',
                                    latitud : position.coords.latitude,
                                    longitud : position.coords.longitude,
                                    lat : position.coords.latitude,
                                    lng : position.coords.longitude,
                                    title : "Usted está aquí",
                                    infoWindow: {
                                        content: `<div> 
                                                    <b> Usted está aquí.</b>   <br> 
                                                    <b> Dirección: </b><span id="span-yo-1"></span> <br>
                                                </div>` 
                                    },
                                    icon : icon,
                                    click: function(e) {
                                        reverse_geocoding(this.id,this.latitud,this.longitud);
                                    }
                                });
                        map.addMarkers(markers_data);
                    },
                    error: function(error) {
                        alert('Geolocation failed: '+error.message);
                    },
                    not_supported: function() {
                        alert("Your browser does not support geolocation");
                    },
                    always: function() {
                       // alert("Done!");
                    }
                });
            }


            function agregarMarkersTodos(){
                    //map.removeMarkers();
                    agregarMarkersEventos();
                    agregarMarkersEstados();
                    agregarMarkersUbicacionActual();
            }
    </script>
@endsection