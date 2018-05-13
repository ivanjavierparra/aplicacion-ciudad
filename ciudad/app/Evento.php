<?php

use app\Aspecto;
use app\Categoria;

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evento extends Aspecto
{
    protected $table = 'aspectos';

    public static function getAll() {
        $eventos = Evento::all();
        foreach($eventos as $e){
           $id = $e->categoria_id;
           $categoria = Categoria::getCategoria($id);
           if($categoria->tipo =='evento') {
                $resultado[] = $e;
            }
        } 
        
        return $resultado;
    }

    public static function getQuery() {
        return DB::table("aspectos")
            ->join("categorias", "aspectos.categoria_id", "=", "categorias.id")
            ->where("categorias.tipo", "=", "evento");
    }

    public function aspecto()
    {
        return $this->hasOne('App\Aspecto', "id")->get();
    }

    
}




