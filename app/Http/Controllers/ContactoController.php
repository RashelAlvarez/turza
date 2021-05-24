<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests\ValidacionesRequest;

class ContactoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        
        return view('contacto');
        
    }

    public function store(ValidacionesRequest $request){
        $data=$request->all();
        DB::table('contactos')->insert([
            "nombre_completo" => $request->input('nombre'),
            "razon_social" => $request->input('razonsocial'),
            "rif" => $request->input('rif'),
            "telefono" => $request->input('telefono'),
            "correo" => $request->input('correo'),
            "comentario" => $request->input('comentario'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        
       /*   return $request->all();  */
        return back()->with('info', 'Tu mensaje ha sido enviado correctamente');
    } 



}
