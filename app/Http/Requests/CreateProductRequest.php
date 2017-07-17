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
            'etiqueta'=>'required|unique:bienes,etiqueta',
            'departamento_id'=>'required',
            'ubicacion_exacta_id'=>'required',
            'categoria_id'=>'required',
            'sub_categoria_id'=>'required',
            'tipo_subcat_id'=>'required',
            'status_bienes_id'=>'required',
            'name'=>'required',
            'ape'=>'required',
            'cedula'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'etiqueta.required'=>'La etiqueta no debe estar vacia',
            'departamento_id.required'=>'debe seleccionar un departamento',
            'ubicacion_exacta_id.required'=>'La ubicacion no debe estar vacia',
            'categoria_id.required'=>'la categoria no debe estar vacia',
            'sub_categoria_id.required'=>'La sub-categoria no debe estar vacia',
            'status_bienes_id.required'=>'Debe seleccionar un status',
            'name.required'=>'Debe escribir un nombre del responsable',
            'ape.required'=>'Debe escribir un apellido del responsable',
            'cedula.required'=>'Debe escribir la cedula del responsable',
            'cedula.numeric'=>'La cedula debe ser numerica ejemplo (12345678)',
        ];
    }
}
