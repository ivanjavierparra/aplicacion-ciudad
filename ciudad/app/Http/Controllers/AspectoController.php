<?php

namespace App\Http\Controllers;

use App\Aspecto;
use App\Categoria;
use App\Denunciante;
use App\EstadoObjeto;
use App\Evento;
use Illuminate\Http\Request;

class AspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aspecto  $aspecto
     * @return \Illuminate\Http\Response
     */
    public function show(Aspecto $aspecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aspecto  $aspecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Aspecto $aspecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aspecto  $aspecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspecto $aspecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aspecto  $aspecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspecto $aspecto)
    {
        //
    }

    public function getCategoriasyAspectos()
    {
        
        $categorias = Categoria::getAll(); 
        
        $eventos = Evento::getAll();
        
        $estados = EstadoObjeto::getAll();

        $denunciantes = Denunciante::getAll();

        return view('gmaps2',['categorias'=>$categorias,'eventos'=>$eventos,'estados'=>$estados,'denunciantes'=>$denunciantes]);
    }


    public function getAspectosFiltrados(Request $request){
        $fechahasta = $request->input('fechahasta');
        $fechadesde = $request->input('fechadesde');
        $horadesde = $request->input('horadesde');
        $horahasta = $request->input('horahasta');
        $nombre = $request->input('nombre');
        
        $valores_aceptados = array("todos", "eventos", "estados","estados-solucionados","estados-no-solucionados");
        //TODO validar que tengo $nombre
        if (!in_array($nombre, $valores_aceptados)) {
            $error = [
                'result' => 'error',
            ];
            return response()->json($error);
        }
        

        $tipos = [
            "todos" => Aspecto::getQuery(),
            "eventos" => Evento::getQuery(),
            "estados" => EstadoObjeto::getQuery(),
            "estados-solucionados" => EstadoObjeto::getQuerySolucionados(),
            "estados-no-solucionados" => EstadoObjeto::getQueryNoSolucionados()
        ];

        $query = $tipos[$nombre];
        //mktime()
        
        $query->whereDate('aspectos.created_at', '>=',$fechadesde);
        $query->whereTime('aspectos.created_at','>=',$horadesde);
        $query->whereDate('aspectos.created_at', '<=',$fechahasta);
        $query->whereTime('aspectos.created_at','<=',$horahasta);
        
        $query->select('aspectos.*');

        $data = [
            'result' => "ok",
            'objects' => $query->get()
        ];

        /*$query = Aspecto::all();

        //http://localhost:8000/aspectos/filtrar?nombre=estados&fechadesde=2018-03-11&fechahasta=2018-05-11
        http://localhost:8000/aspectos/filtrar?nombre=eventos&fechadesde=2018-03-10&fechahasta=2018-06-11
        $query = Aspecto::where('created_at', ">", $fechadesde);
      /*  $data = $_GET['nombre'];
        return response()->json(
           $data
       );*/
       
       return response()->json($data);
       
    }

    public function eliminar(Request $request){
       //try{
            Aspecto::eliminar($request->input('id'));
       ///}catch(\Exception $e) {

       //}
        

        $data = [
            'result' => "ok",
            'objects' => Aspecto::getQuery()->get()
        ];

       
        return response()->json($data);
       
    }


    public function solucionar(Request $request){
        
        EstadoObjeto::solucionar($request->input('id'));
        
        $data = [
            'result' => "ok",
            'objects' => Aspecto::getQuery()->get()
        ];

        return response()->json($data);
    }

}
