<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:1', 'confirmed'],
            'telefono' => ['required', 'integer', 'max:999999999999'],
            'razon_social' => ['required', 'string', 'max:255'],
            'domicilio' => ['required', 'string', 'max:255'],
            'id_afip' => ['required', 'string', 'max:255'],
            'cuit' => ['required', 'string', 'max:255'],
            'cod_iibb' => ['required', 'string', 'max:255'],
            'inicio_actividad' => ['required', 'date', 'max:255'],
            'id_rol' => [ 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'razon_social' => $data['razon_social'],
            'telefono' => $data['telefono'],
            'domicilio' => $data['domicilio'],
            'id_afip' => $data['id_afip'],
            'cuit' => $data['cuit'],
            'cod_iibb' => $data['cod_iibb'],
            'inicio_actividad' => $data['inicio_actividad'],
            'id_rol' => "2",
            'password' => Hash::make($data['password']),
        ]);
    }
}
