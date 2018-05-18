<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aspecto extends Model
{
    //
    protected $table = 'aspectos';

    public static function getQuery() {
        return DB::table("aspectos");
    }

    public static function eliminar($id){
       //try{
         //   Aspecto::find($id)->delete();
       //} catch(\Exception $e){

       //}


       if (Aspecto::where('id', '=', $id)->exists()) {
            // aspecto found
            Aspecto::find($id)->delete();
        }

    }

}
