<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionesRequest;

use App\User;


class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

 
    public function index()
    {
        //
      
       
        return view('registrar');
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
    public function store(ValidacionesRequest $request)
    {
        //
   /*        return $request->all();  */
      
         /*    dd($request->file('file')); */
           /*  $request->file('file')->store('rif'); */
          
        $user= User::create([

            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),
            "email" => $request->input('email'),
            'password' => $request->input('password'),
            'razon_social' => $request->input('razon_social'),
            'rif' => $request->input('rif'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
           /*  'file' =>  $request->file('file')->store('public'), */
           'file' => $request->file('file')->storeAs('rif', $request->file->getClientOriginalName()),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
          
        ]);  
    
        $user->role_id='3';
        $user->save();
    /*     $user = User::create($request->all());*/
    session()->flash('exito', 'Se ha registrado correctamente');
    return redirect('registrar');
     /*    return back()->with('success', 'Te has registrado correctamente'); */
         
   
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
