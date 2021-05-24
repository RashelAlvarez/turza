<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class DetalleController extends Controller
{
    //
    /* public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 */

    public function index(){
        $productos = Producto::all();
        return view('admin.material.detalle', compact('productos'));  
    }

    public function show($id){
        $productos = Producto::findOrFail($id);
        return view('componentes.detallep', compact('productos'));   
       /*  return $id; */ 
       
    }

  /*   public function mostrar($id){
        
        $item = Producto::findOrFail($id);
        return view('admin.material.detalle', compact('item'));  
    } */

    public function edit($id)
    {
        //
    }

}
