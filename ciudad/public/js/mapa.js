var map;
var datos;


function ver_mapa(){
     map = new GMaps({
         el: '#map',
         lat: -12.043333,
         lng: -77.028333,
     });

     //datos = testAjax();
     datos = $.ajax({
        type: 'GET',
        url: '/ajax',
        async: false,
        dataType: 'json',
    
        done: function(results) {
            // uhm, maybe I don't even need this?
            JSON.parse(results);
            return results;
        },
        fail: function( jqXHR, textStatus, errorThrown ) {
            console.log( 'Could not get posts, server response: ' + textStatus + ': ' + errorThrown );
        }
    }).responseJSON; 
     //datos = JSON.parse(datos);
     console.log(datos);
    
     localizame();

 }  


 function testAjax() {
    return $.ajax({
        url:   '/ajax',
        type:  'get',
        dataType: 'json',
        success:  function (data) {
         
            

            

          
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
  }


 /*ver_mapa(function(output){
    // here you use the 
    localizame();
  });*/

 
 function localizame(){
     GMaps.geolocate({
         success: function(position) {
             map.setCenter(position.coords.latitude, position.coords.longitude);
                                 
             map.addMarker({
                     lat: position.coords.latitude,
                     lng: position.coords.longitude,
                     title: 'Estás aquí',
                     //icon: 'img/1.png',
                     infoWindow: {
                         content: '<p>HTML Content</p>'
                     },
             });

             agregarMarkers();
         },
         error: function(error) {
             alert('Geolocation failed: '+ error.message);
         },
         not_supported: function() {
             alert("Your browser does not support geolocation");
         },
         always: function() {
            
         }
     });
 }


 function agregarMarkers(){
     console.log("Markers " + datos[0].nombre);
     var locations = [-43.273564102381144,-65.29729677304687,-43.27218925427647,-65.29485059842528,-43.27637619494724,-65.29158903226318 ];
     var i;
     for(i=0;i<6;i++){
        map.addMarker({
            lat: locations[i],
            lng: locations[i+1],
            title: 'Ubicacion actual',
            icon: 'img/1.png',
            infoWindow: {
                content: '<p>HTML Content</p>'
            },
            click: function(e) {
                
                
            }
    });
     }
             
            
            
 }