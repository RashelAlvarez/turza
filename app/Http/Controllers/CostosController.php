<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Cliente;
use App\Precio_Unitario;
use App\Producto;
use Carbon\Carbon;

class CostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $precios=DB::table('precio_producto')
        ->select('precio_producto.id', 'clientes.razon_social', 'productos.nombre', 'precio_unitario')
        ->join('clientes', 'precio_producto.idcliente', '=', 'clientes.id')
        ->join('productos', 'precio_producto.idproducto', '=', 'productos.id')
        ->get();

        $cliente=Cliente::all();
        $productos=Producto::all();

        return view('admin.material.costos', compact('precios', 'cliente', 'productos'));
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

        $costos=Precio_Unitario::create([
            'idcliente' => $request->input('cliente_id'),
            'idproducto' => $request->input('producto_id'),
            'precio_unitario' => $request->input('precio'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);


        return redirect('/costos')->with('costos', 'Se ha agregado el registro exitosamente');
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
