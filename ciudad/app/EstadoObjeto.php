<?php

use app\Aspecto;


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EstadoObjeto extends Aspecto
{
    protected $table = 'aspectos';

    public static function getAllEstados(){
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
    
}
