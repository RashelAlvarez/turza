<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
class InicioController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   


    public function index(){
        $productos=Producto::all();

        return view('index', compact('productos'));
        
    }
    
}

