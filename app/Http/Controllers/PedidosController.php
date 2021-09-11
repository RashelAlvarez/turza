<?php

namespace App\Http\Controllers;
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
use App\Http\Requests\PedidoVendedorRequest;
use App\TipoPago;
use Illuminate\Support\Collection;
/* use Analytics;
use Spatie\Analytics\Period; */

use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Notification;
use \Illuminate\Notifications\Notifiable;

use Illuminate\Database\Query\Processors\Processor;

class PedidosController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {


        $this->middleware([
            
            'auth', /* 'orden'  */
        ]);
        $this->middleware('orden', ['only' => ['mostrarOrden']]);


    }


    public function index()
    {

            $pedido=Pedido::all();
            $tipopago=TipoPago::all();
            $estado=Estado::all();
            $pedidos=DB::table('pedidos')
            ->join('item_pedidos', 'pedidos.nro_orden', '=', 'item_pedidos.id_detalle')
            ->join('clientes', 'pedidos.cliente_id', '=', 'clientes.id')
            ->join('users', 'clientes.user_id', '=', 'users.id')
            ->select('pedidos.nro_orden','pedidos.sub_total', 'pedidos.created_at', 'pedidos.estado')
            ->where('users.id', auth()->user()->id)
            ->orderBy('pedidos.nro_orden')
            ->get();

            $pedidos2=DB::table('pedidos')
            ->select('pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre')
       
            ->join('users', 'pedidos.cliente_id', '=', 'users.id')
            ->join('estado', 'pedidos.estado', '=', 'estado.id')
            ->where('pedidos.cliente_id', auth()->user()->id)
            ->groupBy('pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre')
            ->orderBy('nro_orden')
            ->get();
         


            $pedidos3=DB::table('pedidos')
            ->select('pedidos.id','pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre', 'users.email')
            ->join('users', 'pedidos.cliente_id', '=', 'users.id')
            ->join('estado', 'pedidos.estado', '=', 'estado.id')
            ->groupBy('pedidos.id','pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre', 'users.email')
            ->orderBy('nro_orden')
            ->get();
 

         

 
        return view('admin.material.pedidos' , compact('pedidos', 'pedidos2', 'pedidos3', 'estado', 'tipopago', 'pedido')); 
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


   
  
    public function store(PedidoRequest $request)
    {
        //
        
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



     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
      
    }


    public function mostrarOrden($nro_orden){
     
        $pedidos=DB::table('item_pedidos')
        ->join('productos', 'item_pedidos.idproducto', '=', 'productos.id')
        ->join('pedidos', 'item_pedidos.id_detalle', '=', 'pedidos.nro_orden')
        ->join('tipo_pagos', 'tipo_pagos.id', '=', 'pedidos.tipopago_id')
        ->join('clientes', 'item_pedidos.id_detalle', '=', 'clientes.id')
        ->join('precio_producto', 'item_pedidos.id_detalle', '=', 'precio_producto.id')
        ->select('pedidos.nro_orden', 'productos.nombre', 'item_pedidos.cantidad', 'precio_producto.precio_unitario',
         'item_pedidos.total', 'pedidos.sub_total', 'pedidos.created_at', 'clientes.razon_social', 'clientes.rif',
         'clientes.telefono', 'clientes.direccion', 'pedidos.estado', 'tipo_pagos.nombre as tnombre')
        ->where('pedidos.nro_orden', $nro_orden)
        ->orderBy('pedidos.nro_orden')
        ->get();

       /*  dd($pedidos); */
        /* $pedidos= Pedido::find($id); */
    return view('admin.material.orden.verOrden', compact('pedidos'))->with('pedido', 'Pedido registrado correctamente');; 



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        
        $pedido = Pedido::findOrFail($id); 
       /*  $estado = Estado::select('id', 'nombre')->get();  */
        $estados=Estado::find($id);
        return view('admin.material.frm.modificarPedido', compact( 'estados', 'pedido')); 
     
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       
    $pedido = Pedido::findOrFail($id);
    
    $pedido->estado = $request->estado;
    if ($pedido->save()){
        return redirect('pedidos')->with('exito', 'Datos actualizados exitosamente.');
    }  


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
