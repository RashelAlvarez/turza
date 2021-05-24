<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    public function user(){
        return $this->hasOne(User::class); //devuelve un solo objeto
        //hasMany devuelve un array de objetos relacionados
    }
}
