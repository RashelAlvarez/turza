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
/* 
        $this->middleware('orden'); */

    }


    public function index()
    {
       
 /*        $pedidos = Pedido::with(['user' => function($query){
        $query->where('users.id', auth()->user()->id);} and 'producto'])->get(); */

        /* $pedidos = Pedido::with(['producto.user'])->get(); */


     /*    $pedidos = Pedido::with('producto.user')
                     
                     ->where('user_id', auth()->user()->id)  
                     ->get() ;  */
         
        /*  $pedidos = DB::table('pedidos')
                ->join('productos', 'pedidos.product_id', '=', 'productos.id')
                ->join('users', 'pedidos.user_id', '=', 'users.id')
                ->where('users.id', auth()->user()->id)
                ->get(); */ 
            $estado=Estado::all();
            $pedidos=DB::table('pedidos')
            ->join('item_pedidos', 'pedidos.nro_orden', '=', 'item_pedidos.id_detalle')
            ->join('users', 'pedidos.user_id', '=', 'users.id')
            ->select('pedidos.nro_orden','pedidos.sub_total', 'pedidos.created_at', 'pedidos.estado')
            ->where('users.id', auth()->user()->id)
            ->orderBy('pedidos.nro_orden')
            ->get();

            $pedidos2=DB::table('pedidos')
            ->select('pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre', 'users.email')
            ->join('users', 'pedidos.user_id', '=', 'users.id')
            ->join('estado', 'pedidos.estado', '=', 'estado.id')
            ->where('users.id', auth()->user()->id)
            ->groupBy('pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre', 'users.email')
            ->orderBy('nro_orden')
            ->get();

            $pedidos3=DB::table('pedidos')
            ->select('pedidos.id','pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre', 'users.email')
            ->join('users', 'pedidos.user_id', '=', 'users.id')
            ->join('estado', 'pedidos.estado', '=', 'estado.id')
            ->groupBy('pedidos.id','pedidos.created_at', 'sub_total', 'nro_orden', 'estado.nombre', 'users.email')
            ->orderBy('nro_orden')
            ->get();
           /*  dd($pedidos2); */
 /*    dd($pedidos);  */
        return view('admin.material.pedidos' , compact('pedidos', 'pedidos2', 'pedidos3', 'estado')); 
     
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


   
  
    public function store(Request $request)
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
 /*    foreach($request->pedido as $row){ */
        
    /*          
         $pedido= Pedido::create([
            "user_id" => $row['user_id'],
            "product_id" => $row['producto_id'],
            
            "cantidad" => $row['cantidad'],
            "precio" => $row['precio'],
            "total"=> Cart::getSubtotal(),
            "estado" => 'Pendiente',
             
            "created_at"=>  Carbon::now(),
            "updated_at"=>   Carbon::now(),
            "nro_orden" => $request['nro_orden'],
            ]); 
        */
     


            $pedido= Pedido::create([
                "user_id" => $request['user_id'],
                "nro_orden" => $orden,
                "sub_total"=> Cart::getSubtotal(),
                "estado" => '1',
               /*  "id_itempedidos" => $request['id_itempedidos'], */
                "created_at"=>  Carbon::now(),
                "updated_at"=>   Carbon::now(),

                ]); 

    
/* }   */
        
    

        
     /*    Notification::send($pedidoNew, new Pedidos($message)); */
       
  
   

     
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
      /*   $pedidos = Pedido::findOrFail($nro_orden); */
       
       /*  $pedidos = Pedido::findOrFail($nro_orden); */
        $pedidos=DB::table('item_pedidos')
        ->join('productos', 'item_pedidos.idproducto', '=', 'productos.id')
        ->join('pedidos', 'item_pedidos.id_detalle', '=', 'pedidos.nro_orden')
        ->join('users', 'users.id', '=', 'pedidos.user_id')
        ->select('pedidos.nro_orden', 'productos.nombre', 'item_pedidos.cantidad', 'item_pedidos.total', 
        'productos.precio', 'pedidos.sub_total', 'pedidos.created_at', 'pedidos.estado', 'users.razon_social', 
        'users.rif', 'users.telefono')
        ->where('pedidos.nro_orden', $nro_orden)
        ->orderBy('pedidos.nro_orden')
        ->get();

       /*  dd($pedidos); */
        /* $pedidos= Pedido::find($id); */
    return view('admin.material.orden.verOrden', compact('pedidos')); 



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      /*   $pedido = Pedido::find($id);
     
      return Response::json($pedido); */
        
        $pedido = Pedido::findOrFail($id); 
        $estado = Estado::select('id', 'nombre')->get(); 

        return view('admin.material.frm.modificarPedido', compact( 'estado')); 
     
        
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
