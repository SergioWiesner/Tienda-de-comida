<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productosRequest extends FormRequest
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
            "nombre" => "required|string|max:255",
            "precio" => "required|integer",
            "idlocalidad" => "required|integer",
            "idtipoproducto" => "required|integer",
            "idproveedor" => "required|integer",
            "fechacompra" => "required|date",
            "stock" => "required|integer"
        ];
    }
}
