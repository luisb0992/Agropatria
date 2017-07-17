<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Perfil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('validate.firt.user');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => 'required|min:7',
            'name' => 'required|max:255',
            'ape' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'cedula' => $data['cedula'],
            'name' => strtoupper($data['name']),
            'ape' => strtoupper($data['ape']),
            'perfil_id' => $data['perfil_id'],
            'email' => strtoupper($data['email']),
            'direccion' => strtoupper($data['direccion']),
            'password' => bcrypt($data['password']),
            'status' => $data['status'],
        ]);
    }
}
