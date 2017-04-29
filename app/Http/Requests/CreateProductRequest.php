<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'etiqueta'=>'required',
            'empresa'=>'required',
            'estado_id'=>'required',
            'ubicacion_id'=>'required',
            'tipo_id'=>'required',
            'material_id'=>'required',
            //'descripcion'=>'required',
            'status'=>'required'
        ];
    }

    public function messages()
    {
        return [
        'etiqueta.required'=>'La etiqueta no debe estar vacia',
        'empresa.required'=>'El nombre de la empresa no debe estar vacia',
        'estado_id.required'=>'debe seleccionar un estado',
        'ubicacion_id.required'=>'La ubicacion no debe estar vacia',
        'tipo_id.required'=>'El tipo no debe estar vacio',
        'material_id.required'=>'El material no debe estar vacio',
        //'descripcion.required'=>'La Descripcion no debe estar vacia',
        'status.required'=>'Debe seleccionar un status del producto',
        ];
    }
}
