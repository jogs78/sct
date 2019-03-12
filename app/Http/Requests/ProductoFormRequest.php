<?php

namespace Almacen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            
            'idpartida' => 'required', 
            'descripcion' => 'max:512|required', 
            'unidad_medida' => 'required', 
            'precio' => 'required|numeric', 
            'cantidad' => 'numeric',
            'devolver' => 'max:5',
        ];
    }
}
