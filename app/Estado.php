<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //

    public $table = 'estado';
    protected $fillable = [
        'id','nombre',
    ];


    public function pedidos(){
        return $this->belongsTo(Pedido::class); //devuelve un solo objeto
        //hasMany devuelve un array de objetos relacionados
    }

}
