<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoVendedorRequest;
use DB;
use App\Http\Controllers\Auth;
use App\Producto;
use App\Pedido;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Cart;
use App\ItemPedidos; 
use App\Notifications\Pedidos;
use App\Estado;
use App\Http\Requests\PedidoRequest;
 
use App\TipoPago;
 

class PedidosVendedorController extends Controller
{
    //


    public function store(PedidoVendedorRequest $request){
        
        $orden = Pedido::latest('id')->first();
        if(isset($orden)){
            $orden=str_pad($orden->nro_orden + 1, 7, "0", STR_PAD_LEFT);
       
        foreach($request->pedido as $row){ 
            $item_pedidos= ItemPedidos::create([
               "id_detalle" => $orden,
               "idproducto" => $row['producto_id'],
               "cantidad" => $row['cantidad'],
               "total"=> $row['total'],
               "created_at"=>  Carbon::now(),
               "updated_at"=>   Carbon::now(),
       
               ]); 
           }
        }else{
            $orden=str_pad( 1, 7, "0", STR_PAD_LEFT);
        
       
            foreach($request->pedido as $row){ 
                $item_pedidos= ItemPedidos::create([
                   "id_detalle" => $orden,
                   "idproducto" => $row['producto_id'],
                   "cantidad" => $row['cantidad'],
                   "total"=> $row['total'],
                   "created_at"=>  Carbon::now(),
                   "updated_at"=>   Carbon::now(),
           
                   ]); 
               }
  
                }

     


            $pedido= Pedido::create([
                "cliente_id" => $request['user_id'],
                "nro_orden" => $orden,
                "sub_total"=> Cart::getSubtotal(),
                "estado" => '1',
                "tipopago_id" => $request['tipo_pago'],
               /*  "id_itempedidos" => $request['id_itempedidos'], */
                "created_at"=>  Carbon::now(),
                "updated_at"=>   Carbon::now(),

                ]); 


   

     
        Cart::clear();
       /*  $fromUser = $request['user_id']; */
       $fromUser=auth()->user()->id;
      /*  $toUser=User::find(1); */
    /*   foreach ($users as $user) {
        $user->notify(new PrescriptionNotification($Prescription));
    } */
       $toUser = User::whereHas('role', function($q){$q->where('nombre', 'Operador');   })->get();
   /*     $toUser = User::where ('role_id', '=', 2)->first();
      */
       /*  dd($fromUser); */
 /*       dd($toUser); */

   /*  $users=User::all(); */
    foreach ($toUser as $toUsers) {
        $toUsers->notify(new Pedidos($fromUser));
    }
    return redirect('/pedidos');

        
    }
}
