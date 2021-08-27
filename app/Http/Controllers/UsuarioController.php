<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidacionesRequest;
use App\Http\Requests\DatosUsuario;
use App\User;
use Carbon\Carbon;
use App\Role;
use Illuminate\Http\Request;

use App\Producto;
use App\Vendedor;
use App\Notifications\Pedidos;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function __construct()
    {
        $this->middleware([
            
            'auth',  'roles:Administrador,Operador'
        
        ]);

       
    }


    

    public function index()
    {
        // 
     /* 
        $user = User::all();
        if($user->role_id=='3'){
            return redirect()->route('admin.usuarios.usuario') ;
        }else{
            return redirect()->route('cliente.dashboard') ;
            $datos['usuarios']=User::paginate(5);
            
        } */
  /*       return view('admin.usuarios.usuario'); */
  
        $users=User::all();
        $roles = Role::all();
       /*  $productos=Producto::all(); */
        $vendedor=Vendedor::all();
        return view('admin.material.usuarios', compact('users', 'roles',  'vendedor'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {    
            $plantas = Role::all();
            $response = ['data' => $plantas];
        } catch (\Exception $exception) {
            return response()->json([ 'message' => 'There was an error retrieving the records' ], 500);
        }
        return response()->json($response);
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
/* 
        dd($request->all()); */
    /*     $user= User::create([
           "role_id" => $request->input('role_id'),
            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),
            "email" => $request->input('email'),
            'password' => $request->input('password'),
            'razon_social' => $request->input('razon_social'),
            'rif' => $request->input('rif'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'), 
          
            'vendedor_id' => $request->input('vendedor_id'),
            'file' => $request->file('file')->storeAs('rif', $request->file->getClientOriginalName()),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
          
        ]);   */ 
        $user= User::create([
            "role_id" => $request->input('role_id'),
             /* "nombre" => $request->input('nombre'),
             "apellido" => $request->input('apellido'), */
             "email" => $request->input('email'),
             'password' => $request->input('password'),
       
             "created_at" => Carbon::now(),
             "updated_at" => Carbon::now(),
           
         ]);  
    
        
       
  
    

    session()->flash('exito', 'Se ha registrado correctamente');
    return redirect('/usuarios');
   
     

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
       /*  $user= User::findOrFail($id);
        $roles=Role::all();
        return  response()->json($user); */
        $result = User::where('role_id', $id)->first();
       
        
        if($result) {
            return response()->json([
                'message' => "Data Found",
                "code"    => 200,
                "data"    => $result
            ]);
        } else  {
            return response()->json([
                'message' => "Internal Server Error",
                "code"    => 500
            ]);
        }



    }

    public function getrole($getrole){
  /*       return User::where('role_id', $getrole)->get(); */
        /*  dd($db); */
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
        dd($request->all());
        $user= User::findOrFail($id);
        $user->nombre = $request->get('nombre');
        $user->apellido = $request->get('apellido');
        $user->email =$request->get('email');
        $user->password = $request->get('password');
        $user->role_id = $request->get('role_id');
     

        $user->save();
        
        session()->flash('exito', 'Se ha actualizado los datos correctamente');
        return redirect('/usuarios');
    
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

        User::destroy($id);

        return redirect('/usuarios');
    }
}
