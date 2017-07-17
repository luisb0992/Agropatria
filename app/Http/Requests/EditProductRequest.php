<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'departamento_id'=>'required',
            'ubicacion_exacta_id'=>'required',
            'categoria_id'=>'required',
            'sub_categoria_id'=>'required',
            'tipo_subcat_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'etiqueta.required'=>'La etiqueta no debe estar vacia',
            'departamento_id.required'=>'debe seleccionar un departamento',
            'ubicacion_exacta_id.required'=>'La ubicacion no debe estar vacia',
            'categoria_id.required'=>'la categoria no debe estar vacia',
            'sub_categoria_id.required'=>'La sub-categoria no debe estar vacia'
        ];
    }
}
