@extends('layouts.base')

@section('content')
        <div id="titulo_principal_info">
            <h1 class="my-4" style="text-align:center;">Aplicación para el ciudadano</h1> 
        </div>
        <div id="titulo_secundario_info">
            <h2 class="my-4" style="text-align:center;">Mapa de Aspectos</h2> 
        </div>
        <div class="row justify-content-center" id="info-mapa">
            <div id="map" class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="border:groove;margin-bottom:10px;">
                <!--<div id="map" style="border:groove;" ></div>-->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Leyenda <button id="boton-filtrar" type="button" class="btn btn btn-sm float-right" onclick="localizame()"> <img src="img/localizar.png" height="18" width="18" data-toggle="tooltip" title="Me ubica en el mapa"></button></th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td><img src="{{$categoria->icono}}" height="18" width="18"> {{$categoria->nombre}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                    <td><img src="img/homero.png" height="18" width="18"> Mi Ubicación</td>
                            </tr>
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
                                            <button id="boton-filtrar" type="button" class="btn btn-info btn-sm" onclick="$('#filtros').toggle();"> <img src="img/lupa.png" height="18" width="18" data-toggle="tooltip" title="Mostrar filtros"> Filtrar</button>
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
                                
                                <select id="combo-aspectos" name="combo-aspectos"> 
                                    <option value="todos" selected>Todos</option>
                                    <option value="eventos">Eventos</option>
                                    <option value="estados">Estado de Objetos</option>
                                    <option value="estados-expirados">Eventos Expirados</option>
                                    <option value="estados-no-expirados">Eventos No Expirados</option>
                                    <option value="estados-solucionados">Estados de Objetos Solucionados</option>
                                    <option value="estados-no-solucionados">Estados de Objetos No Solucionados</option>
                                </select>
                            </div>
                        
                                

                                <div class="filtro col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <span>Fecha Desde</span>
                                <!--<input type="datetime-local" name="bdaytime"> -->
                                <input id="fecha-desde" type="date" min="2018-01-01" value="{{date("Y-m-d")}}" value="{{date("Y-m-d")}}" onkeypress="return false" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                                </div>
                            
                                

                                <div class="filtro col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <span>Fecha Hasta</span>
                                <input id="fecha-hasta" type="date" min="2018-01-01" max="{{date("Y-m-d")}}" value="{{date("Y-m-d")}}" onkeypress="return false" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                                </div>
                            
                    
                            </div>
                            <div class="row" style="margin-top:10px;">
                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:5px;">
                                            <div class="panel-heading">
                                                    <div style="text-align:center;">
                                                    <button id="boton-aplicar-filtros" onclick="filtrar()" type="button" class="btn btn-info btn-sm"> <img src="img/aceptar.png" height="18" width="18" data-toggle="tooltip" title="Aplicar filtros"> Aplicar</button>
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
                                        <tbody id="body-tabla">
                                        @foreach($eventos as $evento)
                                                
                                            <tr>
                                                <td>
                                                @foreach($categorias as $categoria)
                                                    @if($evento->categoria_id === $categoria->id)
                                                        <img src="{{$categoria->icono}}" height="18" width="18">
                                                        {{$categoria->nombre}}
                                                        @break
                                                    @endif
                                                @endforeach    
                                                </td>
                                                <td>{{$evento->created_at}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-evento-{{$evento->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,{{$evento->latitud}},{{$evento->longitud}})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-localizar-evento-{{$evento->id}}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa({{$evento}})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-evento-{{$evento->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar({{$evento}})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-evento-{{$evento->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        <b>Fecha de Ocurrencia:</b> {{$evento->fecha_ocurrencia}} <br>  
                                                        <b>Descripción:</b> {{$evento->descripcion}} <br> 
                                                        <b>Dirección: </b><span id="direccion-{{$evento->id}}"></span> <br>
                                                        <b>Denunciante:</b> {{$evento->denunciante_id}} <br>
                                                        <b>Fecha en que fue registrado en el Sistema:</b> {{$evento->created_at}} <br>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach($estados as $estado)
                                            <tr>
                                                <td>
                                                @foreach($categorias as $categoria)
                                                    @if($estado->categoria_id === $categoria->id)
                                                        <img src="{{$categoria->icono}}" height="18" width="18">
                                                        {{$categoria->nombre}}
                                                        @break
                                                    @endif
                                                @endforeach    
                                                </td>
                                                <td>{{$estado->created_at}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-estado-{{$estado->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,{{$estado->latitud}},{{$estado->longitud}})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-localizar-evento-{{$evento->id}}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa({{$estado}})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-estado-{{$estado->id}}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="@if($estado->solucionado === 1) Ya esta solucionado @else Solucionar este elemento @endif" @if($estado->solucionado === 1) disabled @endif > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-estado-{{$estado->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar({{$estado}})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-estado-{{$estado->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        <b>Fecha en que Sucedió:</b> {{$estado->fecha}} <br>  
                                                        <b>Descripción:</b> {{$estado->descripcion}} <br> 
                                                        <b>Dirección: </b><span id="direccion-{{$estado->id}}"></span> <br>
                                                        <b>Denunciante:</b> {{$estado->denunciante_id}} <br>
                                                        <b>Fecha en que fue registrado en el Sistema:</b> {{$estado->created_at}} <br>
                                                        <b>Solucionado:</b> @if($estado->solucionado === 0)
                                                                            No
                                                                     @else
                                                                            Si
                                                                     @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
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



       <!-- modal eliminar -->
       <div id="myModal" class="modal" tabindex="-1" role="dialog">
        <div  class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 id="titulo-modal" class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#myModal').modal('toggle');">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="texto-modal">Modal body text goes here.</p>
                <p>Aca debe setear a manopla los valores del evento/estado que se encuentran en la function elimnar()</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#myModal').modal('toggle');">Cancelar</button>
            </div>
            </div>
        </div>
        </div>

           
       
          
      
          
                

               
           

        

        <script>

                //me muestra los datos escondidos en la tabla cuando apreto el boton verInfo.
                //además, se fija si este td esta oculto o no, si no lo esta lo que hace es
                //llamar a funcion reverse_geocoding (la cual obtiene a partir de lat y long una direccion).
                function mostrarInfo(id,lat,lon){
                    var thenum = id.replace( /^\D+/g, ''); //obtengo los numeros del id: Ej:
                    var selector = "";
                    if (id.indexOf("evento") >= 0){
                        selector = "#datos-evento-" + thenum;
                        
                    }
                    else{
                        selector = "#datos-estado-" + thenum;
                        
                    }
                    console.log(selector);
                    
                    $(selector).toggle();
                    
                    if(!$(selector).is(':hidden')) {
                        var selec = "#direccion-"+thenum;
                        reverse_geocoding(selec,lat,lon);
                    }
                }

                //dada una lat y long te devuelve la direccion
                //Peligro: La API de google te permite hacer pocas consultas por minuto, despues te bloquea por cierto tiempo
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



                //se llama cuando apreto  "boton-aplicar-filtros" (cuando los filtros sin visibles).
                //se deberia implementar un ajax que pida al servidor los filtros que aplicó el usuario 
                function filtrar(){
                    var combo = $("#combo-aspectos").val();
                    var fecha_desde = $("#fecha-desde").val();
                    var fecha_hasta = $("#fecha-hasta").val();
                    
                    var id = 12; // A random variable for this example

                    $.ajax({
                        method: 'POST', // Type of response and matches what we said in the route
                        url: '/filtrar', // This is the url we gave in the route
                        data: {'id' : id}, // a JSON object to send back
                        success: function(response){ // What to do if we succeed
                            console.log(response); 
                        },
                        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                }

                
                

                //muestra en la tabla solo los eventos.
                //muestra en el mapa solo los eventos.
                function mostrarEventos(){
                    @foreach($eventos as $evento)
                                var tabla = `
                                                
                                                    
                                                        <tr>
                                                            <td>
                                                                @foreach($categorias as $categoria)
                                                                    @if($evento->categoria_id === $categoria->id)
                                                                        <img src="{{$categoria->icono}}" height="18" width="18">
                                                                        {{$categoria->nombre}}
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{$evento->created_at}}</td>
                                                            <td style="align:justify;">
                                                                <button id="boton-filtrar-evento-{{$evento->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,{{$evento->latitud}},{{$evento->longitud}})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                                <button id="boton-localizar-evento-{{$evento->id}}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa({{$evento}})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                                <button id="boton-eliminar-evento-{{$evento->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar({{$evento}})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="datos-evento-{{$evento->id}}" colspan="5" class="collapse">
                                                                <div>
                                                                <b>Fecha de Ocurrencia:</b> {{$evento->fecha_ocurrencia}} <br>  
                                                                <b>Descripción:</b> {{$evento->descripcion}} <br> 
                                                                <b>Dirección: </b><span id="direccion-{{$evento->id}}"></span> <br>
                                                                <b>Denunciante:</b> {{$evento->denunciante_id}} <br>
                                                                <b>Fecha en que fue registrado en el Sistema:</b> {{$evento->created_at}} <br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    
                                                
                                            `;

                            $('#body-tabla').append(tabla);
                        
                                                    
                    @endforeach
                    
                    agregarMarkersEventos(true);                            
                                                
                                               
                }
                    



                //muestra en la tabla solo los estados.
                //muestra en el mapa solo los estados.
                function mostrarEstados(){
                    @foreach($estados as $estado)
                                var tabla = `
                                                
                                                    
                                            <tr>
                                                <td>
                                                @foreach($categorias as $categoria)
                                                    @if($estado->categoria_id === $categoria->id)
                                                        <img src="{{$categoria->icono}}" height="18" width="18">
                                                        {{$categoria->nombre}}
                                                        @break
                                                    @endif
                                                @endforeach    
                                                </td>
                                                <td>{{$estado->created_at}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-estado-{{$estado->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,{{$estado->latitud}},{{$estado->longitud}})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-localizar-evento-{{$evento->id}}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa({{$estado}})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-estado-{{$estado->id}}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="@if($estado->solucionado === 1) Ya esta solucionado @else Solucionar este elemento @endif" @if($estado->solucionado === 1) disabled @endif > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-estado-{{$estado->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar({{$estado}})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-estado-{{$estado->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        <b>Fecha en que Sucedió:</b> {{$estado->fecha}} <br>  
                                                        <b>Descripción:</b> {{$estado->descripcion}} <br> 
                                                        <b>Dirección: </b><span id="direccion-{{$estado->id}}"></span> <br>
                                                        <b>Denunciante:</b> {{$estado->denunciante_id}} <br>
                                                        <b>Fecha en que fue registrado en el Sistema:</b> {{$estado->created_at}} <br>
                                                        <b>Solucionado:</b> @if($estado->solucionado === 0)
                                                                            No
                                                                     @else
                                                                            Si
                                                                     @endif
                                                    </div>
                                                </td>
                                            </tr>
                                                    
                                                
                                            `;

                            $('#body-tabla').append(tabla);
                        
                                                    
                    @endforeach
                    
                    agregarMarkersEstados(true);             
                                                
                                               
                }



                //muestra en la tabla todos los eventos y todos los estados.
                //muestra en el mapa todos los eventos y todos los estados.
                function mostrarTodo(){
                    mostrarEventos();
                    mostrarEstados();
                    agregarMarkersTodos();
                }


                //se invoca cuando apreto el boton eliminar que esta en la tabla.
                //recibe como parametro un objeto javascript que representa un evento o un estado.
                //por lo tanto, si quiero obtener el id de ese evento/estado hago aspectoEliminar['id'], 
                //y asi con el resto de los atributos.
                //Debe mostrar un modal para confirmar si desea eliminar o no.
                //La llamada ajax no se hace aca, se hace en el modal.
                function eliminar(aspectoEliminar){
                        console.log("Voy a eliminar a: " + aspectoEliminar);
                        for(var key in aspectoEliminar) {
                            var value = aspectoEliminar[key];
                            console.log(value);
                        }
                        //aca seteo al modal a monopla los valores del evento/estado recibido.                      
                        $('#titulo-modal').text('Hola');
                        $('#texto-modal').text('chau');
                        $('#myModal').show();
                }

                
                //se invoca cuando apreto el boton "localizar" que esta en la tabla.
                //lo que hace es centrar el mapa en la lat y long dada por el aspecto pasado como parámetro,
                //y luego se hace una animacion que pasa el foco desde la tabla al mapa para que quede copado.
                function localizarAspectoMapa(aspecto){
                        //recorro  para obtener latitud y longitud
                        //luego funcionalidad mapa
                        //for(var key in aspecto) {
                            var latitud = aspecto['latitud'];
                            var longitud = aspecto['longitud'];
                            map.setCenter(latitud, longitud);
                            //window.location.hash = '#info-mapa';
                            //$("#map").focus(false);
                            $('html, body').animate({
                                scrollTop: $("#titulo_principal_info").offset().top
                            }, 2000);
                        //}
                }





        /****************** FUNCIONALIDAD DE MAPAS CON GMAPS.JS *****************************/

            var map;      

            //Esto es document.ready: cuando se carga la pagina se carga el mapa con TODOS LOS MARCADORES (es decir, todos los aspectos).
            $(function() {
                ver_mapa();
            });
                        
    
           //crea el mapa, lo asocia al div "map", y centra el mapa en Trelew, especificamente en Plaza Independencia.
           //Ademas, agrega todos los marcadores existentes
           //y un marcador especifico que indica donde estoy actualmente.
           function ver_mapa(){
                map = new GMaps({
                    el: '#map',
                    lat: -43.253203,
                    lng: -65.309628,
                });
                
                agregarMarkersTodos();
                agregarMarkersUbicacionActual();
            }  


            //se invoca cuando apreto el "boton ubicarme" que esta en la tabla "Leyenda".
            //lo que hace es geolocalización: Gmaps me dice donde estoy y me ubica en el mapa.
            //tiene animación: el div del mapa toma el foco.
            function localizame(){
                GMaps.geolocate({
                    success: function(position) {
                        map.setCenter(position.coords.latitude, position.coords.longitude);
                        $('html, body').animate({
                                scrollTop: $("#titulo_principal_info").offset().top
                            }, 2000);
                       
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

            //Agrega un marcador al mapa en la posición donde me encuentro.
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
                                    lat : position.coords.latitude,
                                    lng : position.coords.longitude,
                                    title : "Usted está aquí",
                                    infoWindow: {
                                    content: '<p>Usted está aquí</p>'
                                },
                                    icon : icon
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

            /* Si recibe true, significa que fue invocada por el filtro, entonces muestra en el mapa solo los eventos */
            /* de lo contrario, si es false, al mapa le agrego los eventos y  no elimino ningun marker */
            function agregarMarkersEventos(filtro_activo){
                var markers_data = [];
                if(filtro_activo){
                    map.removeMarkers();
                }
                @foreach($eventos as $evento)
                        @foreach($categorias as $categoria)
                            @if($categoria->id === $evento->categoria_id)
                                var icon = {
                                    url: '{{ asset("$categoria->icono") }}', // url
                                    scaledSize: new google.maps.Size(32, 32), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                                markers_data.push({
                                    lat : '{{$evento->latitud}}',
                                    lng :'{{$evento->longitud}}',
                                    title : "{{$categoria->nombre}}",
                                    infoWindow: {
                                        content: `<div> 
                                                    <b> Descripción: {{$evento->descripcion}} </b> <br> 
                                                    Fecha de Ocurrencia: {{$evento->fecha_ocurrencia}} <br>  
                                                    Denunciante: {{$evento->denunciante_id}} <br>
                                                    Fecha en que fue registrado en el Sistema: {{$evento->created_at}} <br>
                                                </div>`  
                                    },
                                    icon : icon
                                });
                                @break
                            @endif
                        @endforeach
                @endforeach

                map.addMarkers(markers_data);
                agregarMarkersUbicacionActual();
            }


            /* Si recibe true, significa que fue invocada por el filtro, entonces muestra en el mapa solo los estados */
            /* de lo contrario, si es false, al mapa le agrego los estados y  no elimino ningun marker de evento */
            function agregarMarkersEstados(filtro_activo){
                var markers_data = [];
                if(filtro_activo){
                    map.removeMarkers();
                }
                
                @foreach($estados as $estado)
                
                        @foreach($categorias as $categoria)
                            @if($categoria->id === $estado->categoria_id)
                                var icon = {
                                    url: '{{ asset("$categoria->icono") }}', // url
                                    scaledSize: new google.maps.Size(32, 32), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                                markers_data.push({
                                    lat : '{{$estado->latitud}}',
                                    lng :'{{$estado->longitud}}',
                                    title : "{{$categoria->nombre}}",
                                    infoWindow: {
                                        content: `<div> 
                                                    <b> Descripción: {{$estado->descripcion}} </b> <br> 
                                                    Fecha en que Sucedió: {{$estado->fecha}} <br>  
                                                    Denunciante: {{$estado->denunciante_id}} <br>
                                                    Fecha en que fue registrado en el Sistema: {{$estado->created_at}} <br>
                                                    Solucionado: @if($estado->solucionado === 0)
                                                                        No
                                                                    @else
                                                                        Si
                                                                    @endif
                                                </div>`  
                                    },
                                    icon : icon
                                });
                                @break
                            @endif
                        @endforeach

                @endforeach

                map.addMarkers(markers_data);
                agregarMarkersUbicacionActual();
            }



            //Agrega al mapa todos los marcadores (eventos, estados y mi ubicacion actual).
            function agregarMarkersTodos(){
                    agregarMarkersEventos(false);
                    agregarMarkersEstados(false);
                    agregarMarkersUbicacionActual();
            }


            
        </script>
 @endsection