<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedorRequest extends FormRequest
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

            'user_id' => 'required|unique:vendedors',
            'nombre' => 'required',
            'apellido' => 'required',
            'rif' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
        ];
    }
}
