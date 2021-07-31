<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio_Unitario extends Model
{
    //


    public $table = 'precio_producto';
    protected $fillable = [
        'idcliente', 'idproducto', 'precio_unitario',
    ];


  
}
