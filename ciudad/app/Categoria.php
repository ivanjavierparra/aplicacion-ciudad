<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public static function getAllCategorias(){
        return Categoria::all();
    }

    public static function getCategoria($id){
        return Categoria::where("id",$id)->first();
    }
}
