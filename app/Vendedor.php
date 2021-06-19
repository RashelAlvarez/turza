<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    //

    public $table= 'vendedors';
    protected $fillable =[ 
        'nombre', 'apellido',
    ];

    public function user(){
        return $this->hasOne(User::class); //devuelve un solo objeto
        //hasMany devuelve un array de objetos relacionados
    }
}
