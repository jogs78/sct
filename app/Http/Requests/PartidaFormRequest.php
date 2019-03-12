<?php

namespace Almacen\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartidaFormRequest extends FormRequest
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
            'num_partida' => 'required|numeric|unique:partidas',
            'nombre_partida' => 'required|unique:partidas'
        ];
    }
}
