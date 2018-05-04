@extends('layouts.base')

@section('content')
        <div id="titulo_principal">
            <h1 class="my-4" style="text-align:center;">Aplicación para el ciudadano</h1> 
        </div>
        <div id="titulo_secundario">
            <h2 class="my-4" style="text-align:center;">Mapa de Aspectos</h2> 
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Evento/Estado</th>
                                <th>Descripcion</th>
                                <th>Fecha</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <tr>
                                <td>Accidente de Transito</td>
                                <td>Choque frontal fiat 600 y ranger</td>
                                <td>01/01/2016 15:30</td>
                            </tr>
                            <tr>
                                <td>Pelea Callejera</td>
                                <td>Hinchas de River y De Boca</td>
                                <td>01/01/2016 15:30</td>
                            </tr>
                            <tr>
                                <td>Accidente de Transito</td>
                                <td>Choque frontal colectivo y bicicleta</td>
                                <td>01/01/2016 15:30</td>
                            </tr>
                            <tr>
                                <td>Pelea Callejera</td>
                                <td>Alumnos del IMA y PJM</td>
                                <td>01/01/2016 15:30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="map" style="border:groove;" ></div>
            </div>
            <div class="col-sm-2">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Leyenda</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td><img src="{{$categoria->icono}}" height="18" width="18"> {{$categoria->nombre}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>

                /*   LEEEME     ---> LINKS COPADOS    
                --------------------------------------
                
                    https://pepsized.com/customize-your-google-map-markers/
                     https://www.sitepoint.com/google-maps-made-easy-with-gmaps-js/
                */
                
                       
    /*   var map;
           function ver_mapa(){
                map = new GMaps({
                    el: '#map',
                    lat: -12.043333,
                    lng: -77.028333,
                    click: function(event) {

                        //cada vez que hago click, obtengo latitud y longitud.
                        var lat = event.latLng.lat();
                        var lng = event.latLng.lng();

                        console.log(lat + " " + lng);

                        //creo un marker

                        map.addMarker({
                            lat: lat,
                            lng: lng,
                            title: 'hola',
                            infoWindow: {
                                content : 'hola'
                            }
                        });

                        alert('click');

                    },
                });
            }  
            
            function localizame(){
                GMaps.geolocate({
                    success: function(position) {
                        map.setCenter(position.coords.latitude, position.coords.longitude);
                       
                                            
                        map.addMarker({
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                                title: 'Ubicacion Actual',
                                icon: 'img/1.png',
                                infoWindow: {
                                    content: '<p>HTML Content</p>'
                                },
                                click: function(e) {
                                    console.log(position.coords.latitude + " *** " + position.coords.longitude );                                
                                    alert('You clicked in this marker');
                                    
                                }
                        });
                        //
                    },
                    error: function(error) {
                        alert('Geolocation failed: '+error.message);
                    },
                    not_supported: function() {
                        alert("Your browser does not support geolocation");
                    },
                    always: function() {
                        alert("Done!");
                    }
                });
            }


            function agregarMarkers(){
                var locations = [-43.273564102381144,-65.29729677304687,-43.27218925427647,-65.29485059842528,-43.27637619494724,-65.29158903226318 ];
                @for ($i = 0; $i < 6; $i+=2)    
                        
                        map.addMarker({
                                lat: locations[{{$i}}],
                                lng: locations[{{$i+1}}],
                                title: 'Ubicacion Actual',
                                icon: 'img/1.png',
                                infoWindow: {
                                    content: '<p>HTML Content</p>'
                                },
                                click: function(e) {
                                    
                                    
                                }
                        });
                        //
                        @endfor
            }*/


/*map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });           
           //Add listener
google.maps.event.addListener(map, "click", function (event) {
    var latitude = event.latLng.lat();
    var longitude = event.latLng.lng();
    console.log( latitude + ', ' + longitude );
}); //end addListener*/



           
        </script>
 @endsection