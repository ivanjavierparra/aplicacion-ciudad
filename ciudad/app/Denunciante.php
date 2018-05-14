<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denunciante extends Model
{
    //
    public static function getAll(){
        return Denunciante::all();
    }
}
