<?php

namespace App\Http\Controllers;

use App\PrecioProducto;
use App\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ProductAdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware([
            
            'auth', 'roles:Cliente'
        
        ]);
    }

    public function index()
    {
        //
    
    $productos=DB::table('precio_producto')
    ->join('productos', 'precio_producto.idproducto', '=', 'productos.id')
    ->join('clientes', 'precio_producto.idcliente', '=', 'clientes.id')
    ->select('productos.id', 'productos.nombre', 'productos.descripcion', 'productos.image', 
    'productos.impuesto', 'precio_unitario')
    ->where('clientes.user_id', auth()->user()->id)
    ->get();

    
      
    

    $productos3=Producto::all();

   

   
    
      return view('admin.material.productos', compact('productos', 'productos3'));
      
     
    }

        public function mostrarProductos($id){
            
           
            $productos=DB::table('precio_producto')
            ->select('clientes.id','productos.id', 'productos.nombre', 'productos.descripcion', 'productos.image', 'precio_producto.precio_unitario', 'clientes.razon_social')
            ->join('productos', 'precio_producto.idproducto', '=', 'productos.id')
            ->join('clientes', 'precio_producto.idcliente', '=', 'clientes.id')
            ->where('clientes.id', $id)
            ->get();
           /*  return response()->json(array('cliente_id'=>$id)); */

            return  response()->json($productos);
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

/* 

        dd($request->all()); */
        $producto= Producto::create([

            "nombre" => $request->input('nombre'),
            "descripcion" => $request->input('descripcion'),
            "precio" => $request->input('precio'),
            'impuesto' => $request->input('impuesto'),
            'image' => $request->file('file')->storeAs('public/images', $request->file->getClientOriginalName()),
         /*   'image' => $request->file('file')->storeAs('public/images', $request->file->getClientOriginalName()), */
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
          
        ]);  

        return redirect('productad.index')->with('exito', 'Se ha agregado un nuevo producto exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
       $productos=DB::table('precio_producto')
        ->select('productos.id', 'productos.nombre', 'productos.descripcion', 'productos.image', 'precio_producto.precio_unitario')
        ->join('productos', 'precio_producto.idproducto', '=', 'productos.id')
        ->where('productos.id', $id)
        ->get(); 
   /*       $productos = Producto::findOrFail($id);  
         $precio= PrecioProducto::where('productos.id', $id); */
        /*  dd($productos); */
       return view('admin.material.detalle', compact('productos', 'precio')); 
      /*  return $id; */ 
      
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
