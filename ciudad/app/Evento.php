<?php

use app\Aspecto;
use app\Categoria;

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evento extends Aspecto
{
    protected $table = 'aspectos';

    /*public static function getAllEventos(){
        $eventos = Evento::all();
        foreach($eventos as $e){
           $id = $e->categoria_id;
           $categoria = Categoria::getCategoria($id);
           if($categoria->tipo =='evento') {
                $resultado[] = serialize($e);
            }
        } 
        
        //$data = array('data' => $resultado);

        return $resultado;

        
    }*/
    public function aspecto()
    {
        return $this->hasOne('App\Aspecto', "id")->get();
    }

    public static function getAllEventos(){
        return Evento::all();
    }
}




