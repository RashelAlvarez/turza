<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
            
            'auth',
        
        ]);
    }

    public function index()
    {
        //
        $productos=Producto::all();


        return view('admin.material.productos', compact('productos'));
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
        $productos = Producto::findOrFail($id);
       return view('admin.material.detalle', compact('productos')); 
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
