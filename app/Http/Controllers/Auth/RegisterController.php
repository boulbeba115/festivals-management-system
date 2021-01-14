<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/dashboard';

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
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|digits:8|unique:users|',
            'tel' => 'required|digits:8',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            
        ],
        [
            'name.required' =>'Le Champ Nom est un Champs obligatoires.',
            'name.max' =>'Le Nom est trop Long.',
            'cin.required' =>'Le Champ Nom est un Champs obligatoires.',
            'name.digits' =>'Le num Cin doit etre former d"un entier de 8 nombre.',
            'cin.unique' =>'il Existe Deja un compte avec ce Numero de Cin.',
            'tel.required' =>'Le Nom est un Champs obligatoires.',
            'tel.digits' =>'Le Numero de Telephone doit etre former d"un entier de 8 nombre.',
            'email.required' =>'Le Champ Email est un Champs obligatoires.',
            'email.email' =>'La forme de l"email n"est pas valide.',
            'email.max' =>'L Email entré est trop Long',
            'email.unique' =>'il Existe Deja un compte avec ce Email.',
            'password.required' =>'Le Mot de Pass  est un Champs obligatoires.',
            'password.min' =>'Le Mot de Pass doit comporte au minimum 6 caractere.',
            'password.confirmed' =>'La confirmation du mot de passe ne correspond pas.',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'prenom'=> $data['prenom'],
            'cin'=> $data['cin'],
            'tel'=> $data['tel'],


        ]);
    }
}
