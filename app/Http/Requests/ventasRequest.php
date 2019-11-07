<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ventasRequest extends FormRequest
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
            "clientes.cedula" => "required",
            "clientes.nombre" => "required",
            "clientes.ciudad" => "required",
            "producto.id" => "required",
            "producto.nombre" => "required",
            "producto.stock" => "required",
            "producto.valorunidad" => "required",
            "producto.cantidad" => "required",
            "valortotal" => "required|"
        ];
    }
}
