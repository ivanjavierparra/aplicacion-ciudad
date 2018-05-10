<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    @foreach($categorias as $p)
        {{ $p->nombre }}
    @endforeach



<script>

/*   LEEEME     ---> LINKS COPADOS    
--------------------------------------

    https://pepsized.com/customize-your-google-map-markers/
     https://www.sitepoint.com/google-maps-made-easy-with-gmaps-js/
*/

 /*      
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






$("#filtros").toggle();









/*  Código para Hacer un Ajax para reverse_geocoding directo sin impleemntar la api de google:



/* $.ajax({url: "http://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&sensor=true", success: function(result){
                        var selec = "#direccion-"+thenum;
                        
                        var lista;
                        for(var key in result) {
                            lista = result[key];
                            console.log(lista);
                            break;
                        }
                        
                        var valor;

                        for(var key in lista) {
                            valor = lista[key];
                            console.log(valor);
                            break;
                        }    

                        $(selec).text(valor['formatted_address']);
                    }});*/


*/

</script>

</body>
</html>