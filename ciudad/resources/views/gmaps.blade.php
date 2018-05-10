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
                                                        {{$categoria->nombre}}
                                                        @break
                                                    @endif
                                                @endforeach    
                                                </td>
                                                <td>{{$evento->created_at}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-evento-{{$evento->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-evento-{{$evento->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar({{$aspectoEliminar = $evento}})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-evento-{{$evento->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        Fecha de Ocurrencia: {{$evento->fecha_ocurrencia}} <br>  
                                                        Descripción: {{$evento->descripcion}} <br> 
                                                        Latitud: {{$evento->latitud}} <br> 
                                                        Longitud: {{$evento->longitud}} <br>
                                                        Denunciante: {{$evento->denunciante_id}} <br>
                                                        Fecha en que fue registrado en el Sistema: {{$evento->created_at}} <br>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @foreach($estados as $estado)
                                            <tr>
                                                <td>
                                                @foreach($categorias as $categoria)
                                                    @if($estado->categoria_id === $categoria->id)
                                                        {{$categoria->nombre}}
                                                        @break
                                                    @endif
                                                @endforeach    
                                                </td>
                                                <td>{{$estado->created_at}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-estado-{{$estado->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-estado-{{$estado->id}}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="@if($estado->solucionado === 1) Ya esta solucionado @else Solucionar este elemento @endif" @if($estado->solucionado === 1) disabled @endif > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-estado-{{$estado->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-estado-{{$estado->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        Fecha en que Sucedió: {{$estado->fecha}} <br>  
                                                        Descripción: {{$estado->descripcion}} <br> 
                                                        Latitud: {{$estado->latitud}} <br> 
                                                        Longitud: {{$estado->longitud}} <br>
                                                        Denunciante: {{$estado->denunciante_id}} <br>
                                                        Fecha en que fue registrado en el Sistema: {{$estado->created_at}} <br>
                                                        Solucionado: @if($estado->solucionado === 0)
                                                                            No Solucionado
                                                                     @else
                                                                            Solucionado
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
                <p>@if(!empty($aspectoEliminar) > 0){{$aspectoEliminar}}@endif</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Aceptar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#myModal').modal('toggle');">Cancelar</button>
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
                    var selector = "";
                    if (id.indexOf("evento") >= 0){
                        selector = "#datos-evento-" + thenum;
                        
                    }
                    else{
                        selector = "#datos-estado-" + thenum;
                        
                    }
                    console.log(selector);
                    $(selector).toggle();
                }

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

                
                
                function mostrarEventos(){
                    @foreach($eventos as $evento)
                                var tabla = `
                                                
                                                    
                                                        <tr>
                                                            <td>
                                                                @foreach($categorias as $categoria)
                                                                    @if($evento->categoria_id === $categoria->id)
                                                                        {{$categoria->nombre}}
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{$evento->created_at}}</td>
                                                            <td style="align:justify;">
                                                                <button id="boton-filtrar-evento-{{$evento->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                                <button id="boton-eliminar-evento-{{$evento->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="datos-evento-{{$evento->id}}" colspan="5" class="collapse">
                                                                <div>
                                                                    Fecha de Ocurrencia: {{$evento->fecha_ocurrencia}} <br>  
                                                                    Descripción: {{$evento->descripcion}} <br> 
                                                                    Latitud: {{$evento->latitud}} <br> 
                                                                    Longitud: {{$evento->longitud}} <br>
                                                                    Denunciante: {{$evento->denunciante_id}} <br>
                                                                    Fecha en que fue registrado en el Sistema: {{$evento->created_at}} <br>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    
                                                
                                            `;

                            $('#body-tabla').append(tabla);
                        
                                                    
                    @endforeach
                                                
                                                
                                               
                }
                    




                function mostrarEstados(){
                    @foreach($estados as $estado)
                                var tabla = `
                                                
                                                    
                                            <tr>
                                                <td>
                                                @foreach($categorias as $categoria)
                                                    @if($estado->categoria_id === $categoria->id)
                                                        {{$categoria->nombre}}
                                                        @break
                                                    @endif
                                                @endforeach    
                                                </td>
                                                <td>{{$estado->created_at}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-estado-{{$estado->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id)" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-solucionar-estado-{{$estado->id}}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" title="@if($estado->solucionado === 1) Ya esta solucionado @else Solucionar este elemento @endif" @if($estado->solucionado === 1) disabled @endif > <img src="img/solucionar.png" height="18" width="18"></button>
                                                    <button id="boton-eliminar-estado-{{$estado->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-estado-{{$estado->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        Fecha en que Sucedió: {{$estado->fecha}} <br>  
                                                        Descripción: {{$estado->descripcion}} <br> 
                                                        Latitud: {{$estado->latitud}} <br> 
                                                        Longitud: {{$estado->longitud}} <br>
                                                        Denunciante: {{$estado->denunciante_id}} <br>
                                                        Fecha en que fue registrado en el Sistema: {{$estado->created_at}} <br>
                                                        Solucionado: @if($estado->solucionado === 0)
                                                                            No Solucionado
                                                                     @else
                                                                            Solucionado
                                                                     @endif
                                                    </div>
                                                </td>
                                            </tr>
                                                    
                                                
                                            `;

                            $('#body-tabla').append(tabla);
                        
                                                    
                    @endforeach
                                                
                                                
                                               
                }




                function mostrarTodo(){
                    mostrarEventos();
                    mostrarEstados();
                }



                function eliminar(id){
                        console.log(id);
                        
                        $('#titulo-modal').text('Hola');
                        $('#texto-modal').text('chau');
                        $('#myModal').show(id);
                        
                }


















                    /*   LEEEME     ---> LINKS COPADOS    
                --------------------------------------
                
                    https://pepsized.com/customize-your-google-map-markers/
                     https://www.sitepoint.com/google-maps-made-easy-with-gmaps-js/
                */
                $(function() {
                   ver_mapa();
                   //localizame();
                   //agregarMarkers();
                });
                       
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

                       // alert('click');

                    },
                });
                localizame();
                agregarMarkers();
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
                                    //alert('You clicked in this marker');
                                    
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
                       // alert("Done!");
                    }
                });
            }


            function agregarMarkers(){
                var locations = [-43.273564102381144,-65.29729677304687,-43.27218925427647,-65.29485059842528,-43.27637619494724,-65.29158903226318 ];
                @for ($i = 0; $i < 6; $i+=2)    
                    @foreach($categorias as $categoria)    
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
                        @break
                    @endforeach
                    @break
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
 @endsection