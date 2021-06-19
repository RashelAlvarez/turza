<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendedor;
use App\Http\Requests\VendedorRequest;
class VendedorController extends Controller
{
    //



    public function store(VendedorRequest $request){
       
        $vendedor = Vendedor::create([
            "nombre" => $request->input('nombre'),
            "apellido" => $request->input('apellido'),

        ]);
        return redirect('/usuarios'); 

    }
}
