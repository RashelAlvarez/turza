<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPedidos extends Model
{
    //

    public $table = 'item_pedidos';
    protected $fillable = [
        'id_detalle','idproducto', 'cantidad', 'total'
    ];


    public function pedidos(){
        return $this->belongsTo(Pedido::class); //devuelve un solo objeto
        //hasMany devuelve un array de objetos relacionados
    }





}
