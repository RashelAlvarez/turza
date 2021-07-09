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

         
        $user=DB::table('users')
        ->select('users.id', 'users.email')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('users.role_id', 4)
        ->get();
        $vendedor=DB::table('vendedors')
        ->select('vendedors.id','users.email', 'vendedors.rif', 'vendedors.direccion', 'vendedors.telefono' )
        ->join('users', 'vendedors.user_id', '=', 'users.id')
        ->get();

        return view('admin.material.vendedores' , compact('vendedor', 'user'));
    }

    public function store(VendedorRequest $request){
       
        $vendedor = Vendedor::create([
            "user_id" => $request->input('user_id'),
            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),
            "rif" => $request->input('rif'),
            "direccion" => $request->input('direccion'),
            "telefono" => $request->input('telefono'),
        ]);
        return redirect('/vendedor')->with('exito', 'Datos registrados correctamente');; 

    }
}
