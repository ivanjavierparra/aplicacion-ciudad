<?php

namespace App\Http\Controllers;

use App\EstadoObjeto;
use App\Categoria;
use App\Denunciante;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EstadoObjetoController extends Controller
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
        $estado_objeto = new EstadoObjeto;
        $categoria = Categoria::getCategoria($id);
        return view('estadoobjeto.estado-objeto-add', ['estado_objeto' => $estado_objeto, "categoria" => $categoria ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado_objeto = new EstadoObjeto;

        $estado_objeto->fecha = date("Y-m-d H:i:s");
        $estado_objeto->descripcion = $request->descripcion;
        $estado_objeto->latitud = $request->latitud;
        $estado_objeto->longitud = $request->longitud;
        $estado_objeto->categoria_id = Categoria::where('nombre',$request->categoria)->first()->id;
        try{
            $estado_objeto->denunciante_id = Denunciante::where('telefono',$request->denunciante)->firstOrFail()->id;
        }catch (ModelNotFoundException $e){
            $nuevo_denunciante = new Denunciante;
            $nuevo_denunciante->telefono = $request->denunciante;
            $nuevo_denunciante->save();
            $estado_objeto->denunciante_id = $nuevo_denunciante->id;
        }
        $estado_objeto->tipo = $request->tipo;

        $estado_objeto->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadoObjeto  $estadoObjeto
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoObjeto $estadoObjeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadoObjeto  $estadoObjeto
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoObjeto $estadoObjeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadoObjeto  $estadoObjeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoObjeto $estadoObjeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoObjeto  $estadoObjeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoObjeto $estadoObjeto)
    {
        //
    }
}
