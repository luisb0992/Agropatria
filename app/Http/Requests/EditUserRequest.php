<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class EditUserRequest extends FormRequest
{
    /*
    @ $route
     */
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }
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
        //dd($this->route->parameter('user'));
        return [
            'cedula'=>'required|numeric',
            'name'=>'required',
            'ape'=>'required',
            'email'=>'required|email|unique:users,email,'. $this->route->parameter('user'),
            'fechanac'=>'required|date',
            'perfil_id'=>'required|in:1,2',
            'status'=>'required|in:1,0',
        ];
    }

    public function messages()
    {
        return [
        'cedula.required'=>'La cedula no debe estar vacia',
        'cedula.numeric'=>'La cedula solo debe tener numeros, Ejemplo: 12345678',
        'name.required'=>'El nombre no debe estar vacio',
        'ape.required'=>'El apellido no debe estar vacio',
        'email.required'=>'El correo no debe estar vacio',
        'email.email'=>'El correo debe ser formato email, Ejemplo: yo@ejemplo.com',
        'email.unique'=>'El correo no debe estar en uso',
        'fechanac.required'=>'La fecha de nacimiento no debe estar vacia',
        'fechanac.date'=>'La fecha de nacimiento debe ser en formato: dd/mm/aa',
        'perfil_id.required'=>'Debe seleccionar un perfil del usuario',
        'perfil_id.in'=>'Error al elegir el perfil del usuario',
        'status.required'=>'Debe seleccionar un status',
        'status.in'=>'Error al elegir el status del usuario',
        ];
    }
}
