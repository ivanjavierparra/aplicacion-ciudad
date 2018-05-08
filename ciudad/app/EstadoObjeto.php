<?php

use app\Aspecto;


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EstadoObjeto extends Aspecto
{
    protected $table = 'aspectos';

    //protected $table = ['estado_objetos'];
   // protected $fillable = [
     //   'id', 'fecha', 'descripcion','latitud','longitud','categoria_id','denunciante_id','created_at','updated_at','solucionado'
    //];

    
    //protected $hidden = [
      //  'password', 'remember_token',
    //];

   /* public static function getAllEstados(){
        $estados = EstadoObjeto::all();
        foreach($estados as $e){
           $id = $e->categoria_id;
           $categoria = Categoria::getCategoria($id);
           if($categoria->tipo =='estadoobjeto') {
                $resultado[] = serialize($e);
            }
        } 
        
        return $resultado;
    }*/

  /*  public static function getAllEstados(){
        //$items = DB::table('estado_objetos')->get() ;
        $items = DB::table('estado_objetos')
        //->select('aspectos.id','aspectos.descripcion','estado_objetos.solucionado','estado_objetos.created_at','estado_objetos.updated_at')
        ->join('aspectos','estado_objetos.id','=','aspectos.id')
        //->where(['something' => 'something', 'otherThing' => 'otherThing'])
        ->get();
                //$resultado[] = serialize($items);
           
        
        
        return $items;
    } */


    public static function getAllEstados(){
        return EstadoObjeto::all();
    }

    
}
