<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Mail\MensajeRecibido;
use Illuminate\Support\Facades\Mail;
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
     
    public function store(Request $request){
        /* $data=$request->all();
        dd($data); */
        DB::table('contactos')->insert([
            "nombre" => $request->input('nombre'),
            "razon_social" => $request->input('razonsocial'),
            "rif" => $request->input('rif'),
            "telefono" => $request->input('telefono'),
            "email" => $request->input('email'),
            "fcontacto" => $request->file('fcontacto')->store('contacto'),
            "comentario" => $request->input('comentario'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);



        $contacto = [
            'nombre' => $request->nombre,
            'razonsocial' => $request->razonsocial,
            'rif' => $request->rif,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'fcontacto' => $request->file('fcontacto'),
            'comentario' => $request->comentario,
          
         
        ];

    

        Mail::to('ventas.somosturza@gmail.com')->send(new MensajeRecibido($contacto));
       /*   return $request->all();  */
        return back()->with('info', 'Tu mensaje ha sido enviado correctamente');
    } 



}
