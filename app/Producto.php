<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    public $table = 'productos';
    protected $fillable = [
        'nombre', 'descripcion' ,'precio', 'image', 
    ];

    /* VARIOS PRODUCTOS PERTENECEN A UN PEDIDO*/ 
    public function pedido(){
        return $this->hasMany(Pedido::class); //devuelve un solo objeto
        //hasMany devuelve un array de objetos relacionados
    }

    public function precio(){
        return $this->belongsTo(Precio_Unitario::class);
    }

}
