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
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
            'razon_social' => 'required|string|max:100|unique:users',
             'rif' => 'required|max:10',
             'telefono' => 'required|max:11',
            'direccion' => 'required|min:10',
            'file' => 'required|', 
            /* 'role_id' => 'required', */
     
        ];
    }
}
