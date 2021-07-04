<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Pedido extends Model
{
    use Notifiable;
    //
    public $table = 'pedidos';
    protected $fillable = [
        'cliente_id', 'nro_orden',  'sub_total', 'estado', 'tipopago_id'
    ];

    protected $dates = ['expired_at'];
   /*  protected $dates = [
        'created_at',
        'updated_at',
        
    ]; */
    public function cliente(){
        return $this->belongsTo(Cliente::class); //devuelve un solo objeto
        //hasMany devuelve un array de objetos relacionados
    }
 
    public function producto(){
        return $this->belongsTo(Producto::class);

    }


    public function itempedidos(){
        return $this->hasMany(ItemPedidos::class); //devuelve un solo objeto
        //hasMany devuelve un array de objetos relacionados
    }
   
     
     
    public function estado(){
        return $this->belongsTo('App\Estado', 'estado');
    }

    public function orden( array $request){

       
        foreach ($request as $item){
             if ($this->pedido->cliente_id === $item){
             
                return true;
            }
          
        }
      
        return false;

    }

}
