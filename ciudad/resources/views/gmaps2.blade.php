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
                                <th>Leyenda <button id="boton-filtrar" type="button" class="btn btn btn-sm float-right" onclick="localizame()"> <img src="img/localizar.png" height="18" width="18" data-toggle="tooltip" title="Me ubica en el mapa"><b>¿Dónde estoy?</b></button></th>
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
                                <span>Aspectos<span><br>
                                
                                <select id="combo-aspectos" name="combo-aspectos"> 
                                    <option value="todos" selected>Todos</option>
                                    <option value="eventos">Eventos</option>
                                    <option value="estados">Estado de Objetos</option>
                                    <option value="estados-solucionados">Estados de Objetos Solucionados</option>
                                    <option value="estados-no-solucionados">Estados de Objetos No Solucionados</option>
                                </select>
                            </div>
                        
                                

                                <div class="filtro col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <span>Fecha Desde</span><br>
                                <!--<input type="datetime-local" name="bdaytime"> -->
                                <!--<input id="fecha-desde" step="1" type="datetime-local" min="2018-01-01" value="{{date("Y-m-d")}}" value="{{date("Y-m-d")}}" onkeypress="return false" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">-->
                                <input id="fecha-desde" step="1" type="datetime-local" min="2018-01-01" value="{{date("Y-m-d")}}" value="{{date("Y-m-d")}}"  required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                                </div>
                                <!--var streetaddress= fecha.substr(0, fecha.indexOf('T')); -->
                                <!-- var fh = fecha.split('T'); -->

                                <div class="filtro col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <span>Fecha Hasta</span><br>
                                <!--<input id="fecha-hasta" step="1" type="datetime-local" min="2018-01-01" max="{{date("Y-m-d")}}" value="{{date("Y-m-d")}}" onkeypress="return false" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">-->
                                <input id="fecha-hasta" step="1" type="datetime-local" min="2018-01-01" max="{{date("Y-m-d")}}" value="{{date("Y-m-d")}}"  required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                                </div>
                            
                    
                            </div>
                            <div class="row" style="margin-top:10px;">

                                    <!-- alerts boostrap -->
                                    <div id="alerta-filtro" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
                                            <button type="button" class="close"  onclick="$('#alerta-filtro').toggle();"> 
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Mensaje: </strong> Todos los campos son necesarios.
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:5px;">
                                            <div class="panel-heading">
                                                    <div style="text-align:center;">
                                                    <button id="boton-aplicar-filtros" onclick="filtrar()" type="button" class="btn btn-info btn-sm"> <img src="img/aceptar.png" height="18" width="18" data-toggle="tooltip" title="Aplicar filtros"> Aplicar</button>
                                                    </div>
                                            </div>
                                    </div>
                            
                            </div>
                </div>

                <!-- alerts boostsap -->
                <div id="alerta-Eliminar" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;">
                        <button type="button" class="close"  onclick="$('#alerta-Eliminar').toggle();"> 
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Mensaje: </strong> Eliminado Correctamente!.
                </div>

                <!-- alerts boostrap -->
                <div id="alerta-Solucionar" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;">
                        <button type="button" class="close"  onclick="$('#alerta-Solucionar').toggle();"> 
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Mensaje: </strong> Operación exitosa!.
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
                                                <td>{{$evento->created_at->format('d/m/Y H:i:s')}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-evento-{{$evento->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,{{$evento->latitud}},{{$evento->longitud}})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-localizar-evento-{{$evento->id}}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa({{$evento->latitud}},{{$evento->longitud}})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                    @if (Auth::check())
                                                        <button id="boton-eliminar-evento-{{$evento->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar({{$evento->id}},{{$evento->categoria_id}})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-evento-{{$evento->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        <b>Fecha de Ocurrencia:</b> {{date_create($evento->fecha_ocurrencia)->format('d/m/Y H:i:s')}} <br>  
                                                        <b>Descripción:</b> {{$evento->descripcion}} <br> 
                                                        <b>Dirección: </b><span id="direccion-{{$evento->id}}"></span> <br>
                                                    @foreach($denunciantes as $denunciante)
                                                        @if($evento->denunciante_id === $denunciante->id)
                                                            <b>Denunciante (Tel.):</b> {{$denunciante->telefono}} <br>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                        <b>Fecha en que fue registrado en el Sistema:</b> {{$evento->created_at->format('d/m/Y H:i:s')}} <br>
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
                                                <td>{{$estado->created_at->format('d/m/Y H:i:s')}}</td>
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-estado-{{$estado->id}}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,{{$estado->latitud}},{{$estado->longitud}})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-localizar-estado-{{$estado->id}}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa({{$estado->latitud}},{{$estado->longitud}})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                    @if (Auth::check())
                                                        <button id="boton-solucionar-estado-{{$estado->id}}" type="button" class="btn btn-success btn-sm" onclick="solucionar({{$estado->id}},{{$estado->categoria_id}})" data-toggle="tooltip" title="@if($estado->solucionado === 1) Ya esta solucionado @else Solucionar este elemento @endif" @if($estado->solucionado === 1) disabled @endif > <img src="img/solucionar.png" height="18" width="18"></button>
                                                        <button id="boton-eliminar-estado-{{$estado->id}}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar({{$estado->id}},{{$estado->categoria_id}})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td id="datos-estado-{{$estado->id}}" colspan="5" class="collapse">
                                                    <div>
                                                        <b>Fecha en que Sucedió:</b> {{date_create($estado->fecha)->format('d/m/Y H:i:s')}} <br>  
                                                        <b>Descripción:</b> {{$estado->descripcion}} <br> 
                                                        <b>Dirección: </b><span id="direccion-{{$estado->id}}"></span> <br>
                                                    @foreach($denunciantes as $denunciante)
                                                        @if($estado->denunciante_id === $denunciante->id)
                                                            <b>Denunciante (Tel.):</b> {{$denunciante->telefono}} <br>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                        <b>Fecha en que fue registrado en el Sistema:</b> {{$estado->created_at->format('d/m/Y H:i:s')}} <br>
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
            </div>
      </div>
        
      </div> 



       <!-- modal eliminar -->
       <div id="modalEliminar" class="modal" tabindex="-1" role="dialog" style="display:none;">
            <div  class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:black;color:white;font-wight:bold">
                        <h5 id="titulo-modal" class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalEliminar').modal('toggle');">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="texto-modal">Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer" style="background-color:gold">
                        <button type="button" class="btn btn-primary btnEliminarAjax" id="1" onclick="eliminarAjax(this.id)">Aceptar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modalEliminar').modal('toggle');">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal solucionar -->
       <div id="modalSolucionar" class="modal" tabindex="-1" role="dialog">
            <div  class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:black;color:white;font-wight:bold">
                        <h5 id="titulo-modal-solucionar" class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modalSolucionar').modal('toggle');">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="texto-modal-solucionar">Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer" style="background-color:gold">
                        <button type="button" class="btn btn-primary btnSolucionarAjax" id="1" onclick="solucionarAjax(this.id)">Aceptar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#modalSolucionar').modal('toggle');">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
       
        <script>
                var filtro_activado = false;


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
                    console.log(selec);
                    console.log(lat);
                    console.log(lon);
                    var latlng = new google.maps.LatLng(lat, lon);
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                        if (status !== google.maps.GeocoderStatus.OK) {
                            //alert(status);
                        }
                        // This is checking to see if the Geoeode Status is OK before proceeding
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(results);
                            var address = (results[0].formatted_address);
                            console.log(address);
                            $(selec).text(address);
                        }
                        else{
                            console.log("Error" + status);
                        }
                    });
                }

                

                function getItemSeleccionadoCombo(){
                    var combo = $("#combo-aspectos").val();
                    if(combo=="todos"){
                        return "todos";
                    }
                    else{
                        if(combo.includes("eventos")){
                            return "eventos";
                        }
                        else{
                            return "estados";
                        }
                    }
                }

                //se llama cuando apreto  "boton-aplicar-filtros" (cuando los filtros sin visibles).
                //se deberia implementar un ajax que pida al servidor los filtros que aplicó el usuario 
                function filtrar(){
                    var combo = $("#combo-aspectos").val();
                    var fechahoradesde = $("#fecha-desde").val();
                    var fechahorahasta = $("#fecha-hasta").val();

                    if((fechahoradesde=="") || (fechahorahasta=="")){
                        $("#alerta-filtro").show();
                        return;
                    }
                    
                    var fecha_hora_desde = fechahoradesde.split('T');
                    var fecha_hora_hasta = fechahorahasta.split('T');

                    var fecha_desde = fecha_hora_desde[0];
                    var hora_desde = fecha_hora_desde[1];
                    var fecha_hasta = fecha_hora_hasta[0];
                    var hora_hasta = fecha_hora_hasta[1];

                    console.log(fecha_desde);
                    console.log(hora_desde);
                    console.log(fecha_hasta);
                    console.log(hora_hasta);
                    console.log(combo);
                   // return;

                    $("#body-tabla").empty();
                    filtro_activado = true;
                    
                    


                    
                  $.ajax({
                            url: "{{ route('filtrar')}}",
                            data:  {
                                nombre:combo,
                                fechadesde:fecha_desde,
                                fechahasta:fecha_hasta,
                                horadesde:hora_desde,
                                horahasta:hora_hasta,
                            },
                            dataType: "json",
                            method: "get",
                            success: function(result)
                            {
                                if (result['result'] == 'ok')
                                {
                                        //console.log("El ajax me trajo esto: " + result);
                                        //for(var key in result) {
                                            //var value = result[key];
                                            //console.log(value);
                                       // }
                                       
                                        var datos = result['objects'];
                                        //si datos no es vacio entonces proceso....
                                        if (typeof datos !== 'undefined' && datos.length > 0) {
                                            armarTabla(datos);
                                            agregarMarcadoresFiltro(datos);
                                        }
                                        else{
                                            //datos es vacio......elimino marcadores del mapa....
                                            vaciarMapa();
                                        }
                                        

                                        
                                       // var aspecto;
                                        //for(var i=0;i<datos.length;i++){
                                            //for(var i=0;i<aspecto.length;i++){
                                               // console.log(datos[i]);
                                          //      aspecto = datos[i];
                                            //    break;
                                            //}
                                       // }
                                        //VALIDAR QUE EL ARREGLO NO SEA 
                                        
                                        //ARMAR TABLA

                                        //ARMAR MAPA

                                       // console.log("Lo entendi!!!!! " + aspecto['id']);
                                        //var categoria = getCategoria(aspecto['id'])
                                        //console.log("Tu nombre es: " + categoria['nombre']);
                                        //console.log("Tu icono es: " + categoria['icono']);
                                        
                                        
                                        
                                }
                                else
                                {
                                    console.log("El ajax fallo: " + result['objects']);
                                    vaciarMapa();
                                }
                            },
                            fail: function(){
                                console.log("El ajax fallo: ");
                            },
                            beforeSend: function(){
                                console.log("atenti voy a enviar un ajax. ");
                            }
                        });

//                console.log("Sera asincrono? " + datos);
                       

                }


                function vaciarMapa(){
                    map.removeMarkers();
                    agregarMarkersUbicacionActual();
                    map.setCenter(-43.253203,-65.309628); //centro el mapa en la plaza independencia de trelew
                }

                
                //recibo el id de una categoria y devuelvo su nombre y su icono.
                function getCategoria(id){
                    var categorias = {!! json_encode($categorias->toArray()) !!};
                    var resultado;
                    for(var i=0;i<categorias.length;i++) {
                        //console.log((categorias[i])['nombre']);
                        if((categorias[i])['id']==id){
                            resultado = {
                                nombre : (categorias[i])['nombre'],
                                icono :  (categorias[i])['icono'],
                                tipo : (categorias[i])['tipo'],
                            };
                            return resultado;
                        }
                    }
                }
                
                
                //recibo el id de un denunciante y devuelvo su telefono y su nick.
                function getDenunciante(id){
                    var denunciantes = {!! json_encode($denunciantes->toArray()) !!};
                    var resultado;
                    for(var i=0;i<denunciantes.length;i++) {
                        //console.log((denunciantes[i])['nombre']);
                        if((denunciantes[i])['id']==id){
                            resultado = {
                                telefono : (denunciantes[i])['telefono'],
                                nick :  'Anónimo',
                            };
                            return resultado;
                        }
                    }
                }


                function armarTabla(aspectos){
                    $("#body-tabla").empty();
                    if(!filtro_activado){//si el filtro no esta activado armo tabla con php.blade
                        agregarTodosTabla(aspectos);
                    }
                    else{
                        var combo = getItemSeleccionadoCombo();
                        switch(combo){
                           case 'todos':
                                agregarTodosTabla(aspectos);
                                break;
                           case 'eventos':
                                agregarEventosTabla(aspectos);
                                break;
                           case 'estados':
                                agregarEstadosTabla(aspectos);
                                break;
                        }
                    }
                }


                
                    


                function agregarEventosTabla(aspectos){
                    for(var i=0;i<aspectos.length;i++){
                        var categoria = getCategoria((aspectos[i])['categoria_id']);
                        var denunciante = getDenunciante((aspectos[i])['denunciante_id']);
                        var fila = "";
                        if ((aspectos[i])['tipo']=="evento"){
                            fila = ` 

                                            <tr>
                                                <td>
                                                    <img src="${categoria['icono']}" height="18" width="18">
                                                    ${categoria['nombre']}
                                                </td>
                                                <td>${new Date((aspectos[i])['created_at']).toLocaleString()}</td>

                                                
                                                <td style="align:justify;">
                                                    <button id="boton-filtrar-evento-${(aspectos[i])['id']}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,${(aspectos[i])['latitud']},${(aspectos[i])['longitud']})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                    <button id="boton-localizar-evento-${(aspectos[i])['id']}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa(${(aspectos[i])['latitud']},${(aspectos[i])['longitud']})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                    @if (Auth::check())
                                                        <button id="boton-eliminar-evento-${(aspectos[i])['id']}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar(${(aspectos[i])['id']},${(aspectos[i])['categoria_id']})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td id="datos-evento-${(aspectos[i])['id']}" colspan="5" class="collapse">
                                                    <div>
                                                    <b>Fecha de Ocurrencia:</b> ${new Date((aspectos[i])['fecha_ocurrencia']).toLocaleString()} <br>  
                                                    <b>Descripción:</b> ${(aspectos[i])['descripcion']} <br> 
                                                    <b>Dirección: </b><span id="direccion-${(aspectos[i])['id']}"></span> <br>
                                                    <b>Denunciante (Tel.):</b> ${denunciante['telefono']} <br>
                                                    <b>Fecha en que fue registrado en el Sistema:</b> ${new Date((aspectos[i])['created_at']).toLocaleString()} <br>
                                                    </div>
                                                </td>
                                            </tr>


                                            `;
                        }
                        if (!fila==""){
                            $('#body-tabla').append(fila);
                        }
                    }
                }

                function agregarEstadosTabla(aspectos){
                    for(var i=0;i<aspectos.length;i++){
                        var categoria = getCategoria((aspectos[i])['categoria_id']);
                        var denunciante = getDenunciante((aspectos[i])['denunciante_id']);
                        var fila = "";
                        if ((aspectos[i])['tipo']=="estadoobjeto"){
                            fila = ` 

                                                <tr>
                                                    <td>
                                                        <img src="${categoria['icono']}" height="18" width="18">
                                                        ${categoria['nombre']}
                                                    </td>
                                                    <td>${new Date((aspectos[i])['created_at']).toLocaleString()}</td>
                                                    <td style="align:justify;">
                                                        <button id="boton-filtrar-estado-${(aspectos[i])['id']}" type="button" class="btn btn-warning btn-sm" onclick="mostrarInfo(this.id,${(aspectos[i])['latitud']},${(aspectos[i])['longitud']})" data-toggle="tooltip" title="Mostrar más información"> <img src="img/info.png" height="18" width="18"></button>
                                                        <button id="boton-localizar-estado-${(aspectos[i])['id']}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Localizar en el mapa" onclick="localizarAspectoMapa(${(aspectos[i])['latitud']},${(aspectos[i])['longitud']})"> <img src="img/localizar.png" height="18" width="18"></button>
                                                        @if (Auth::check())
                                                            <button id="boton-solucionar-estado-${(aspectos[i])['id']}" type="button" class="btn btn-success btn-sm" onclick="solucionar(${(aspectos[i])['id']},${(aspectos[i])['categoria_id']})" data-toggle="tooltip" title="${(aspectos[i])['solucionado']==1 ? "Ya esta solucionado" : "Solucionar este elemento"}" ${(aspectos[i])['solucionado']==1 ? 'disabled' : '' }> <img src="img/solucionar.png" height="18" width="18"></button>
                                                            <button id="boton-eliminar-estado-${(aspectos[i])['id']}" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar este elemento" onclick="eliminar(${(aspectos[i]['id'])},${(aspectos[i])['categoria_id']})"> <img src="img/eliminar.png" height="18" width="18"></button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td id="datos-estado-${(aspectos[i])['id']}" colspan="5" class="collapse">
                                                        <div>
                                                            <b>Fecha en que Sucedió:</b> ${new Date((aspectos[i])['fecha']).toLocaleString()} <br>  
                                                            <b>Descripción:</b> ${(aspectos[i])['descripcion']} <br> 
                                                            <b>Dirección: </b><span id="direccion-${(aspectos[i])['id']}"></span> <br>
                                                            <b>Denunciante (Tel.):</b> ${denunciante['telefono']} <br>
                                                            <b>Fecha en que fue registrado en el Sistema:</b> ${new Date((aspectos[i])['created_at']).toLocaleString()} <br>
                                                            <b>Solucionado:</b> ${(aspectos[i])['solucionado']==0 ? "No" : "Si"}
                                                        </div>
                                                    </td>
                                                </tr>


                                            `;
                        }
                        if (!fila==""){
                            $('#body-tabla').append(fila);
                        }
                    }
                }
               
                function agregarTodosTabla(aspectos){
                    agregarEventosTabla(aspectos);
                    agregarEstadosTabla(aspectos);
                }


                


                //se invoca cuando apreto el boton eliminar que esta en la tabla.
                //recibe como parametro un objeto javascript que representa un evento o un estado.
                //por lo tanto, si quiero obtener el id de ese evento/estado hago aspectoEliminar['id'], 
                //y asi con el resto de los atributos.
                //Debe mostrar un modal para confirmar si desea eliminar o no.
                //La llamada ajax no se hace aca, se hace en el modal.
                function eliminar(aspectoEliminar,categoria_id){
                        console.log("Voy a eliminar a: " + aspectoEliminar);
                        var categoria = getCategoria(categoria_id);
                        $('#titulo-modal').text(categoria['nombre']);
                        if(categoria['tipo']=="evento"){
                            $('#texto-modal').text("¿Está seguro que desea eliminar este Evento?");
                        }
                        else{
                            $('#texto-modal').text("¿Está seguro que desea eliminar este Estado Objeto?");
                        }
                        
                        $('.btnEliminarAjax').attr("id",aspectoEliminar);
                        $('#modalEliminar').show();

                        /*for(var key in aspectoEliminar) {
                            var value = aspectoEliminar[key];
                            console.log(value);
                        }
                        //aca seteo al modal a monopla los valores del evento/estado recibido.                      
                        $('#titulo-modal').text('Hola');
                        $('#texto-modal').text('chau');
                        $('.btnEliminarAjax').attr("id",aspectoEliminar['id']);
                        $('#modalEliminar').show();*/
                }


                //funcion que recibe id del aspecto y hace una peticion al servidor para eliminarlo.
                function eliminarAjax(idAspecto){
                    $('#modalEliminar').hide();
                    $.ajax({

                            url: "{{ route('eliminar')}}",
                            data:  {
                                id:idAspecto,
                                _token: '{{csrf_token()}}'
                            },
                            dataType: "json",
                            method: "post",
                            success: function(result)
                            {
                                if (result['result'] == 'ok')
                                {
                                        //console.log("El ajax me trajo esto: " + result);
                                        //for(var key in result) {
                                          //  var value = result[key];
                                            //console.log(value);
                                        //}
                                        //alert("Eliminado correctamente!");
                                        $("#alerta-Eliminar").show();
                                        var datos = result['objects'];
                                        //armarTabla(datos);
                                        //agregarMarcadoresFiltro(datos);
                                        
                                        if (typeof datos !== 'undefined' && datos.length > 0) {
                                            armarTabla(datos);
                                            agregarMarcadoresFiltro(datos);
                                        }
                                        else{
                                            //datos es vacio......elimino marcadores del mapa....
                                            $("#body-tabla").empty();
                                            vaciarMapa();
                                        }
                                }
                                else
                                {
                                    console.log("El ajax fallo: ");
                                    vaciarMapa();
                                }
                            },
                            fail: function(){
                                console.log("El ajax fallo: ");
                            },
                            beforeSend: function(){
                                console.log("atenti voy a enviar un ajax. ");
                            }
                        });
                        
                }
                


                //se invoca cuando apreto el boton solucionar que esta en la tabla.
                //recibe como parametro un objeto javascript que representa un estado.
                //por lo tanto, si quiero obtener el id de ese estado hago aspectoEliminar['id'], 
                //y asi con el resto de los atributos.
                //Debe mostrar un modal para confirmar si desea solucionar o no.
                //La llamada ajax no se hace aca, se hace en el modal.
                function solucionar(aspectoSolucionar,categoria_id){
                        console.log("Voy a solucionar a: " + aspectoSolucionar);
                        var categoria = getCategoria(categoria_id);
                        $('#titulo-modal-solucionar').text(categoria['nombre']);
                        $('#texto-modal-solucionar').text('¿Está seguro que desea solucionar este Estado de Objeto?');
                        $('.btnSolucionarAjax').attr("id",aspectoSolucionar);
                        $('#modalSolucionar').show();
                        /*for(var key in aspectoSolucionar) {
                            var value = aspectoSolucionar[key];
                            console.log(value);
                        }
                        //aca seteo al modal a monopla los valores del evento/estado recibido.                      
                        $('#titulo-modal-solucionar').text('Hola');
                        $('#texto-modal-solucionar').text('chau');
                        $('.btnSolucionarAjax').attr("id",aspectoSolucionar['id']);
                        $('#modalSolucionar').show();*/
                }


                //funcion que recibe id del aspecto y hace una peticion al servidor para solucionarlo.
                function solucionarAjax(idAspecto){
                    $('#modalSolucionar').hide();
                    $.ajax({
                            url: "{{ route('solucionar')}}",
                            data:  {
                                id:idAspecto,
                                _token: '{{csrf_token()}}'
                            },
                            dataType: "json",
                            method: "post",
                            success: function(result)
                            {
                                if (result['result'] == 'ok')
                                {
                                        //console.log("El ajax me trajo esto: " + result);
                                        //for(var key in result) {
                                          //  var value = result[key];
                                            //console.log(value);
                                        //}
                                        
                                        $("#alerta-Solucionar").show();
                                        var datos = result['objects'];
                                       // armarTabla(datos);
                                        //agregarMarcadoresFiltro(datos);
                                        
                                        if (typeof datos !== 'undefined' && datos.length > 0) {
                                            armarTabla(datos);
                                            agregarMarcadoresFiltro(datos);
                                        }
                                        else{
                                            //datos es vacio......elimino marcadores del mapa....
                                            vaciarMapa();
                                        }
                                        //alert("Solucionado correctamente!");
                                        
                                }
                                else
                                {
                                    console.log("El ajax fallo: ");
                                    vaciarMapa();
                                }
                            },
                            fail: function(){
                                console.log("El ajax fallo: ");
                            },
                            beforeSend: function(){
                                console.log("atenti voy a enviar un ajax. ");
                            }
                            });


                           
                }






                //se invoca cuando apreto el boton "localizar" que esta en la tabla.
                //lo que hace es centrar el mapa en la lat y long dada por el aspecto pasado como parámetro,
                //y luego se hace una animacion que pasa el foco desde la tabla al mapa para que quede copado.
                function localizarAspectoMapa(latitud,longitud){
                        //recorro  para obtener latitud y longitud
                        //luego funcionalidad mapa
                        //for(var key in aspecto) {
                            var latitud = latitud;
                            var longitud = longitud;
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

                 var estado;
                @foreach($estados as $estado)
                        estado = '{{$estado}}';
                        console.log("js con php: " + estado);
                        @break
                @endforeach

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

            /* Si recibe true, significa que fue invocada por el filtro, entonces muestra en el mapa solo los eventos */
            /* de lo contrario, si es false, al mapa le agrego los eventos y  no elimino ningun marker */
            function agregarMarkersEventos(){
                var markers_data = [];
                
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
                                                    <b> Descripción: </b> {{$evento->descripcion}}  <br> 
                                                    <b> Fecha de Ocurrencia: </b> {{date_create($evento->fecha_ocurrencia)->format('d-m-Y H:i:s')}} <br>  
                                                    <b> Dirección: </b> <span id="span-evento-{{$evento->id}}"></span> <br>
                                                    @foreach($denunciantes as $denunciante)
                                                        @if($evento->denunciante_id === $denunciante->id)
                                                            <b> Denunciante (Tel.): </b> {{$denunciante->telefono}} <br>
                                                            @break
                                                        @endif
                                                    @endforeach
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
                                                    <b> Descripción: </b>  {{$estado->descripcion}} <br> 
                                                    <b> Fecha en que Sucedió: </b> {{date_create($estado->fecha)->format('d-m-Y H:i:s')}} <br>  
                                                    <b> Dirección: </b> <span id="span-estado-{{$estado->id}}"></span> <br>
                                                    @foreach($denunciantes as $denunciante)
                                                        @if($estado->denunciante_id === $denunciante->id)
                                                            <b> Denunciante (Tel.): </b> {{$denunciante->telefono}} <br>
                                                            @break
                                                        @endif
                                                    @endforeach
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



            //Agrega al mapa todos los marcadores (eventos, estados y mi ubicacion actual).
            function agregarMarkersTodos(){
                    map.removeMarkers();
                    agregarMarkersEventos();
                    agregarMarkersEstados();
                    agregarMarkersUbicacionActual();
            }


            

            function agregarMarcadoresFiltro(aspectos){
                map.removeMarkers();
                var markers_data = [];
                for(var i=0;i<aspectos.length;i++){
                        var categoria = getCategoria((aspectos[i])['categoria_id']);
                        var denunciante = getDenunciante((aspectos[i])['denunciante_id']);
                        var icono = categoria['icono'];
                        console.log("Estoy en filtro-mapas, icon: " + categoria['icono']);
                        
                        var icon = {
                                    url: categoria['icono'],
                                    scaledSize: new google.maps.Size(32, 32), // scaled size
                                    origin: new google.maps.Point(0,0), // origin
                                    anchor: new google.maps.Point(0, 0) // anchor
                                };

                        if ((aspectos[i])['tipo']=="evento"){
                            markers_data.push({
                                    id : "#span-evento-"+(aspectos[i])['id'],
                                    latitud : (aspectos[i])['latitud'],
                                    longitud : (aspectos[i])['longitud'], 
                                    lat : (aspectos[i])['latitud'],
                                    lng : (aspectos[i])['longitud'],
                                    title : categoria['nombre'],
                                    infoWindow: {
                                        content: `<div> 
                                                    <b> Descripción:</b> ${(aspectos[i])['descripcion']}  <br> 
                                                    <b> Fecha de Ocurrencia:</b> ${new Date((aspectos[i])['fecha_ocurrencia']).toLocaleString()} <br>  
                                                    <b> Dirección: </b><span id="span-evento-${(aspectos[i])['id']}"></span><br>
                                                    <b> Denunciante (Tel.):</b> ${denunciante['telefono']} <br>
                                                    <b> Fecha en que fue registrado en el Sistema:</b> ${new Date((aspectos[i])['created_at']).toLocaleString()} <br>
                                                </div>`  
                                    },
                                    icon : icon,
                                    click: function(e) {
                                        reverse_geocoding(this.id,this.latitud,this.longitud);
                                    }
                                });
                        }
                        else{
                            markers_data.push({
                                    id : "#span-estado-"+(aspectos[i])['id'],
                                    latitud : (aspectos[i])['latitud'],
                                    longitud : (aspectos[i])['longitud'], 
                                    lat : (aspectos[i])['latitud'],
                                    lng : (aspectos[i])['longitud'],
                                    title : categoria['nombre'],
                                    infoWindow: {
                                        content: `<div> 
                                                    <b> Descripción:</b> ${(aspectos[i])['descripcion']}  <br> 
                                                    <b> Fecha de Ocurrencia:</b> ${new Date((aspectos[i])['fecha_ocurrencia']).toLocaleString()} <br> 
                                                    <b> Dirección: </b><span id="span-estado-${(aspectos[i])['id']}"></span><br>
                                                    <b> Denunciante (Tel.):</b> ${denunciante['telefono']} <br>
                                                    <b> Fecha en que fue registrado en el Sistema:</b> ${new Date((aspectos[i])['created_at']).toLocaleString()} <br>
                                                    <b> Solucionado:</b> ${(aspectos[i])['solucionado']==0 ? "No" : "Si"}
                                                </div>`  
                                    },
                                    icon : icon,
                                    click: function(e) {
                                        reverse_geocoding(this.id,this.latitud,this.longitud);
                                    }
                                });
                        }
                }
                map.addMarkers(markers_data);
                agregarMarkersUbicacionActual();
                map.setCenter(-43.253203,-65.309628); //centro el mapa en la plaza independencia de trelew
            }
            
        </script>
 @endsection