<?php

use app\Aspecto;


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EstadoObjeto extends Aspecto
{
    protected $table = 'aspectos';

    public static function getAll() {
        $estados = EstadoObjeto::all();
        foreach($estados as $e){
           $id = $e->categoria_id;
           $categoria = Categoria::getCategoria($id);
           if($categoria->tipo =='estadoobjeto') {
                $resultado[] = $e;
            }
        } 
        
        return $resultado;
    }

    public static function getQuery() {
        return DB::table("aspectos")
            ->join("categorias", "aspectos.categoria_id", "=", "categorias.id")
            ->where("categorias.tipo", "=", "estadoobjeto");
    }

    public static function solucionar($id){
        $estado = EstadoObjeto::find($id);
        $estado->solucionado = 1;
        $estado->save();

    }
    
    //https://laravel.com/docs/5.6/queries#joins
}
