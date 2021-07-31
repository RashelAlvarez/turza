<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Cart;
use DB;
use App\Pedido;
use App\TipoPago;
use App\Http\Controllers\Session;

class CartController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware([
            
            'auth', /* 'roles:Administrador, Cliente, Operador' */
        
        ]);
    }

     

    public function add(Request $request){
        $productos = Producto::find($request->producto_id);
      /*   $subtotal= [];
        $subtotal= Cart::getSubTotal();
         $finalTotal = array_sum($subtotal); */
        Cart::add(
            $productos->id,
            $productos->nombre,
       
            $productos->precio,
            $request->quantity,
             
            array("descripcion"=>$productos->descripcion)
            
           
          
         );

       
        return redirect('/cart/checkout');
    }

    public function checkout(){
 
      
      /*   $orden = Pedido::latest('id')->first();
        if(isset($orden)){

            $orden=str_pad($orden->nro_orden + 1, 7, "0", STR_PAD_LEFT);
            $productos=Producto::all();
            return view('admin.material.checkout', compact('productos', 'orden'));
        }else{
           
          
            $orden=str_pad( 1, 7, "0", STR_PAD_LEFT);
         
            $productos=Producto::all();
            return view('admin.material.checkout', compact('productos', 'orden'));
        } */
        $productos=Producto::all();
        $tipopago=TipoPago::all();
        $cliente=DB::table('clientes')
        ->select('clientes.id', 'clientes.razon_social')
        ->get();
        return view('admin.material.checkout', compact('productos', 'tipopago', 'cliente'));
    }


    /* public function get_order_number(){

    return '#' . str_pad($this->id, 8, "0", STR_PAD_LEFT);
    
    } */

    public function removeitem(Request $request){
      /*   $productos = Producto::where('id', $request->id)->firstOrfail(); */
        $productos = Producto::find($request->id);  
        
      Cart::remove([
            'id' => $request->id,
        ]);
          
        return redirect()->back();
      
 
 

    }

    public function clear(){
      
        Cart::clear();
        return back()->with('success', 'Se ha limpiado el carrito con exito');

    }
}
