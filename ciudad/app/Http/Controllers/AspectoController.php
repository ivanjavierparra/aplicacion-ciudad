<?php

namespace App\Http\Controllers;

use App\Aspecto;
use App\Categoria;
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
        //obtener todos los eventos

        //obtener todos los estados

        //for e ir creando un nuevo objeto
        
        $categorias = Categoria::getAllCategorias(); 
        
        $eventos = Evento::getAllEventos();
        
        

        $estados = EstadoObjeto::getAllEstados();



        return view('probando',['categorias'=>$categorias,'eventos'=>$eventos,'estados'=>$estados]);
    }


}
