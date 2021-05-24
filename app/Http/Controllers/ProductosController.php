<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    //


    
    public function index(){
        $productos=Producto::all();
        return view('productos', compact('productos'));
        
        if (User::has('login')){
            return view('cliente.productos');
        }
       

    }




}
