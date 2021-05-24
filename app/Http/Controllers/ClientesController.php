<?php

namespace App\Http\Controllers;
 
use App\User;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\DatosUsuario;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware([
            
            'auth', 'roles:Administrador,Operador'
        
        ]);
    }
    public function index()
    {
        //
        $productos=Producto::all();
 /*        $clientes=Cliente::all(); */
        $user=User::all();
       
     
        return view('admin.material.clientes', compact('user', 'productos'));
 
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
    public function store(DatosUsuario $request)
    {
        //
           /*   dd($request->file('file')); */
    /*    $cliente = (new Cliente)->fill($request->all());
       $cliente->file = $request->file('file')->store('rif');
        
    
       $cliente->user_id = auth()->id();
  
       $cliente->save();
       session()->flash('info', 'Se han registrado los datos correctamente');
       return redirect('cliente.index'); */
  /*      dd($request->file('file')->store('rif')); */
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
        $user = User::findOrFail($id);
        $filename = $user->file;
        $pathToFile = storage_path($filename);
       /*  dd($pathToFile); */
        return view( 'admin.material.carrito'    , compact('filename'));
       /*  return Storage::response("$filename"); */
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
        $user= User::findOrFail($id);
        
        return view('admin.material.frm.modificarCliente', compact('user'));

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
       /*  dd($request->all()); */
        $user= User::findOrFail($id);
        $user->razon_social = $request->get('razon_social');
        $user->rif = $request->get('rif');
        $user->telefono =$request->get('telefono');
        $user->direccion = $request->get('direccion');

  

        $user->save();
        session()->flash('exito', 'Se ha actualizado los datos correctamente');
        return redirect('/clientes');
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
