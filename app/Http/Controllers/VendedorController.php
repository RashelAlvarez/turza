<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use App\User;
use DB;
use App\Http\Requests\VendedorRequest;
class VendedorController extends Controller
{
    //

    public function index(){

         
      $vendedor=Vendedor::all();
     /*    $vendedor=DB::table('vendedors')
        ->select('vendedors.id', 'vendedors.rif', 'vendedors.direccion', 'vendedors.telefono' )
       
        ->get(); */


        return view('admin.material.vendedores' , compact('vendedor'));
    }

    public function store(VendedorRequest $request){
       
        $vendedor = Vendedor::create([
           
            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),
            "rif" => $request->input('rif'),
            "direccion" => $request->input('direccion'),
            "telefono" => $request->input('telefono'),
        ]);
        return redirect('/vendedor')->with('exito', 'Datos registrados correctamente');; 

    }
}
