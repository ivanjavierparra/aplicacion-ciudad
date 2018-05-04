@extends('layouts.base')


@section('content')
        <div id="titulo_principal">
            <h1 class="my-4" style="text-align:center;">Aplicación para el ciudadano</h1> 
        </div>
        <div id="titulo_secundario">
            <h2 class="my-4" style="text-align:center;">Mapa de Aspectos</h2> 
        </div>
 
        <div class="row justify-content-center">

            <div id="map" style="border:groove;" >

            </div>
           <!-- <div class="col">
                <div id="map" style="border:groove;" >
                    
                    
                </div>
            </div>
           <div class="col">
                <div class="table-responsive" style="border:groove;">
                    <table class="table">
                                        
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>-->
            
            
        </div>
        <!--<div id="boton">
            <button onclick="ver_mapa()"> Ver Mapa </button>
            
        </div>
        <div>
                <button onclick="localizame()"> Geolocalizame </button>
        </div>
        <div>
                <button onclick="agregarMarkers()"> Mostrar todos los Aspectos </button>
        </div>-->
		
       
        
        
        <script>

                /*   LEEEME     ---> LINKS COPADOS    
                --------------------------------------
                
                    https://pepsized.com/customize-your-google-map-markers/
                     https://www.sitepoint.com/google-maps-made-easy-with-gmaps-js/
                */
                
                       
   /*    var map;
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