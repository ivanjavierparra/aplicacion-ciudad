@extends('layouts.base')

@section('content')
        <div id="titulo_principal">
            <h1 class="my-4" style="text-align:center;">Aplicación para el ciudadano</h1> 
        </div>
        <div id="titulo_secundario">
            <h2 class="my-4" style="text-align:center;">Mapa de Aspectos</h2> 
        </div>
        <div class="row justify-content-center">
            <div id="map" class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="border:groove;margin-bottom:10px;">
                <!--<div id="map" style="border:groove;" ></div>-->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
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
        <div id="titulo_secundario">
            <h2 class="my-4" style="text-align:center;">Listado de Aspectos</h2> 
        </div>
        <div class="container-fluid" id="paneltodo">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                    
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:5px;">
                                    <div class="panel-heading">
                                            <div style="text-align:right;">
                                            <button id="boton-filtrar" type="button" class="btn btn-info btn-sm" onclick=ocultarFiltros()> <img src="img/lupa.png" height="18" width="18" data-toggle="tooltip" title="Mostrar filtros"> Filtrar</button>
                                            </div>
                                    </div>
                            </div>
                    
                    </div>
                    <div id="filtros" class="collapse filtro" style="border-radius: 4px;" > <!--filtros-->
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#17a2b8;border-radius: 4px;margin-bottom:10px;">
                                <div id="titulo_secundario">
                                    <center><span class="my-4" style="text-align:center;color:white">Filtros</span> </center>
                                </div>
                            </div>
                            <div class="filtro col-lg-4 col-md-10 col-sm-12 col-xs-12" >
                                <span>Aspectos<span>
                                
                                <select name="combo-aspectos"> 
                                    <option value="todos" selected>Todos</option>
                                    <option value="eventos">Eventos</option>
                                    <option value="estados">Estado de Objetos</option>
                                    <option value="estados">Eventos Expirados</option>
                                    <option value="estados">Eventos No Expirados</option>
                                    <option value="estados">Estados de Objetos Solucionados</option>
                                    <option value="estados">Estados de Objetos No Solucionados</option>
                                </select>
                            </div>
                        
                                

                                <div class="filtro col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <span>Fecha Desde</span>
                                <!--<input type="datetime-local" name="bdaytime"> -->
                                <input id="date" type="date" min="2018-01-01">
                                </div>
                            
                                

                                <div class="filtro col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <span>Fecha Hasta</span>
                                <input id="date" type="date" min="2018-01-01">
                                </div>
                            
                    
                            </div>
                            <div class="row" style="margin-top:10px;">
                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:5px;">
                                            <div class="panel-heading">
                                                    <div style="text-align:center;">
                                                    <button id="boton-filtrar" type="button" class="btn btn-info btn-sm"> <img src="img/aceptar.png" height="18" width="18" data-toggle="tooltip" title="Aplicar filtros"> Aplicar</button>
                                                    </div>
                                            </div>
                                    </div>
                            
                            </div>
                </div>
            
                <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-11 col-sm-11 col-xs-11">
                            <div class="table-responsive">
                                    <table class="table table-bordered table-sm table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Evento/Estado</th>
                                                
                                                <th>Fecha</th>
                                                <th>Acciones</th>
                                            </tr>    
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Accidente de Transito</td>
                                                
                                                <td>01/01/2016 15:30</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-1" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-1" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="Solucionar estado de objeto" > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-1" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-1" colspan="5" class="collapse">
                                                    <div>
                                                        Fecha: 30 jun. <br>  Horario: 17 hs <br> Estadio: Kazán Arena <br> Ciudad: Kazán
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pelea Callejera</td>
                                                
                                                <td>01/01/2016 15:30</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-2" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-2" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="Solucionar estado de objeto" > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-2" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-2" colspan="5" class="collapse">
                                                    <div>
                                                        Fecha: 30 jun. <br>  Horario: 17 hs <br> Estadio: Kazán Arena <br> Ciudad: Kazán
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Accidente de Transito</td>
                                                
                                                <td>01/01/2016 15:30</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-3" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-3" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="Solucionar estado de objeto" > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-3" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-3" colspan="5" class="collapse">
                                                    <div>
                                                        Fecha: 30 jun. <br>  Horario: 17 hs <br> Estadio: Kazán Arena <br> Ciudad: Kazán
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Pelea Callejera</td>
                                                
                                                <td>01/01/2016 15:30</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-4" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-4" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="Solucionar estado de objeto" > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-4" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-4" colspan="5" class="collapse">
                                                    <div>
                                                        Fecha: 30 jun. <br>  Horario: 17 hs <br> Estadio: Kazán Arena <br> Ciudad: Kazán
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                </div>
            
                <div class="panel-footer">
                    <div class="row float-right" >
                        <ul class="pagination" >
                            <li class="page-item"><a class="page-link" href="#" style="background-color:black;color:white">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="background-color:black;color:white">1</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="background-color:black;color:white">2</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="background-color:black;color:white">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" style="background-color:black;color:white">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
      </div>
        
      </div> 

        


        <script>
                function ocultarFiltros(){
                    $("#filtros").toggle();
                }

                function mostrarInfo(id){
                    var thenum = id.replace( /^\D+/g, ''); //obtengo los numeros del id: Ej:
                    var selector = "#datos-" + thenum;
                    console.log(selector);
                    $(selector).toggle();
                }
               
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