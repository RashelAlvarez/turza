<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Cliente;
use App\Role;
use App\Http\Requests\DatosUsuario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware([
            
            'auth'
        
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->id();
      /*   $productos = Producto::all();
        return view('detalle', compact('productos')); */
      /*   $role_id = Role::all(); */

        return view('cliente.dashboard');
    }

    public function store(DatosUsuario $request){
       /*   dd($request->file('file')); */
       $cliente = (new Cliente)->fill($request->all());
       $cliente->file = $request->file('file')->store('rif');
        
    
       $cliente->user_id = auth()->id();
  
       $cliente->save();
       session()->flash('info', 'Se han registrado los datos correctamente');
       return redirect('home');
  /*      dd($request->file('file')->store('rif')); */
    }


}
