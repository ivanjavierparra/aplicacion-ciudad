<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="static/css/estilos.css">-->
        <style type="text/css">
            #map {
              width: 400px;
              height: 400px;
            }
          </style>
        <title>Fixture Rusia 2018</title>
    </head>
    <body>
        <div id="titulo" >
            <h1 style="color: black"><center>Municipalidad de Trelew</center></h1>
            <h2 style="color: black"><center>mapita</center></h2>
        </div>
        <div id="map">
            
            
        </div>
        <div id="boton">
            <button onclick="ver_mapa()"> Ver Mapa </button>
            
        </div>
        <div>
                <button onclick="localizame()"> Geolocalizame </button>
        </div>
        <div>
                <button onclick="agregarMarkers()"> Mostrar todos los Aspectos </button>
        </div>
		
       
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <!-- <script src="http://maps.google.com/maps/api/js"></script>-->
        <script src="js/googlemapsapi.js"></script>
        <script src="js/gmaps.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
        <script>

                /*   LEEEME     ---> LINKS COPADOS    
                --------------------------------------
                
                    https://pepsized.com/customize-your-google-map-markers/
                     https://www.sitepoint.com/google-maps-made-easy-with-gmaps-js/
                */


            var map;
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
            }


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
    </body>
</html> 