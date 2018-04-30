<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="static/css/bootstrap.min.css">
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
            <button onclick="ver_mapa()"> Ver Mapa </button>
            
        </div>
        <div>
                <button onclick="localizame()"> Geolocalizame </button>
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
            var map;
            function ver_mapa(){
                map = new GMaps({
                    el: '#map',
                    lat: -12.043333,
                    lng: -77.028333
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
                    
    
        </script>
    </body>
</html> 