<?php

namespace App\Http\Controllers;

use App\Evento;
use App\EstadoObjeto;
use App\Categoria;
use App\Denunciante;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class EventoController extends Controller
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
    public function create($id)
    {
        $evento = new Evento;
        $categoria = Categoria::getCategoria($id);
        $categorias = Categoria::getAll();
        $eventos = Evento::getAll();
        $estados = EstadoObjeto::getAll();
        return view('eventos.evento-add', ['evento' => $evento, "categoria" => $categoria, "categorias" => $categorias, "eventos" => $eventos, "estados" => $estados ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $evento = new Evento;
        try{
            $evento->fecha = date("Y-m-d H:i:s"); /* esto no iria.....esto tendria que estar en estados....*/
            $evento->descripcion = $request->descripcion;
            $evento->categoria_id = Categoria::where('nombre',$request->categoria)->first()->id;
            $evento->latitud = $request->latitud;
            $evento->longitud = $request->longitud;
            try{
                $evento->denunciante_id = Denunciante::where('telefono',$request->denunciante)->firstOrFail()->id;
            }catch (ModelNotFoundException $e){
                $nuevo_denunciante = new Denunciante;
                $nuevo_denunciante->telefono = $request->denunciante;
                $nuevo_denunciante->save();
                $evento->denunciante_id = $nuevo_denunciante->id;
            }
            
            $evento->fecha_ocurrencia = $request->fecha_ocurrencia;
            $evento->tipo = $request->tipo;
            $evento->save();   
            return redirect('/')->with('status', 'Aspecto cargado correctamente!');
        }catch(QueryException $e){
            return redirect("/evento/crear/{$evento->categoria_id}")->with('status', 'Debe seleccionar una opción en el mapa o la ubicación actual!');    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
