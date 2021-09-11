<?php

namespace App\Http\Controllers;
use DB;
use App\Vendedor; 
use App\User;
use App\Producto;
use App\Role;
use App\Cliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionesRequest;
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
            
            'auth', 'roles:Administrador,Operador,Vendedor'
        
        ]);
    }
    public function index()
    {
        
    
        $clientes=Cliente::all();
        $clientes2=DB::table('clientes')
        ->select('clientes.id', 'clientes.nombre', 'clientes.apellido', 'razon_social', 'clientes.rif', 'clientes.telefono', 
        'clientes.direccion', 'vendedors.nombre as usvendedor', 'clientes.created_at', 'clientes.file' )
        ->join('vendedors', 'clientes.vendedor_id', '=', 'vendedors.id')
       
        ->get();

        $vendedor=DB::table('vendedors')
        ->select('vendedors.id', 'vendedors.nombre', 'vendedors.apellido')
       
        ->get();
        $user=DB::table('users')
        ->select('users.id', 'users.email')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('users.role_id', 3)
        ->get();
        /* $pedidos=DB::table('pedidos')
        ->join('item_pedidos', 'pedidos.nro_orden', '=', 'item_pedidos.id_detalle')
        ->join('users', 'pedidos.user_id', '=', 'users.id')
        ->select('pedidos.nro_orden','pedidos.sub_total', 'pedidos.created_at', 'pedidos.estado')
        ->where('users.id', auth()->user()->id)
        ->orderBy('pedidos.nro_orden')
        ->get(); */
        /* $roles = Role::all();
        $productos=Producto::all();
        $vendedor=Vendedor::all(); */
        return view('admin.material.clientes', compact('clientes', 'clientes2', 'vendedor', 'user'));
     
       
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

       /*  dd($request->all()); */

        $cliente= Cliente::create([
            'user_id' => $request->input('user_id'),
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
             'razon_social' => $request->input('razon_social'),
             'rif' => $request->input('rif'),
             'telefono' => $request->input('telefono'),
             'direccion' => $request->input('direccion'), 
             'vendedor_id' => $request->input('vendedor_id'),
             'file' => $request->file('file')->storeAs('public', $request->file->getClientOriginalName()),
            
             "created_at" => Carbon::now(),
             "updated_at" => Carbon::now(),
           
         ]);   
     
   /*   $cliente->save();   */     
     
 
     session()->flash('exito', 'Se ha registrado correctamente');
     return redirect('/clientes');

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
     /*    return Response::make(file_get_contents($pathToFile), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]); */
        return response()->file($pathToFile);
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

        Cliente::destroy($id);

        return redirect('/clientes');
    }
}
