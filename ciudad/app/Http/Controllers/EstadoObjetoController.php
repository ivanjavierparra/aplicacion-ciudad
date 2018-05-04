<?php

namespace App\Http\Controllers;

use App\EstadoObjeto;
use Illuminate\Http\Request;

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
    public function create()
    {
        $estado_objeto = new EstadoObjeto;
        return view('estadoobjeto.estado-objeto-add', ['estado_objeto' => $estado_objeto ]);
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

        $estado_objeto->nombre = $request->nombre;
        $estado_objeto->icono = $request->icono;

        $estado_objeto->save();
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
