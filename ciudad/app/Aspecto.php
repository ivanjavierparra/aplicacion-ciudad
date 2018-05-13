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
        Aspecto::find($id)->delete();
    }

}
