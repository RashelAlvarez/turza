<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      
        return [
            //
            'nombre' => 'required',
          
            'razonsocial' => 'required|string|max:100',
            'rif' => 'required|max:10',
            'telefono' => 'required|max:11',
            'direccion' => 'required|min:10',
            'vendedor_id' => 'required',
            'file' => 'required', 
            'mercantil' => 'required',
            'cedula' => 'required',
            'rif_file' => 'required',
            'comentario' => 'required',
            'email' => 'required|email',
        ];
    }
}
