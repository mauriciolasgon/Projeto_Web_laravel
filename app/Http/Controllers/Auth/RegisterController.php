<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Professor;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/login';

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        if($data['profissao']=='Aluno') {
            return User::create([
                'name' => $data['name'],
                'CPF' => $data['CPF'],
                'email' => $data['email'],
                'cep' =>$data['cep'],
                'filmes' =>$data['filmes'],
                'rua' =>$data['rua'],
                'cidade' =>$data['cidade'],
                'bairro' =>$data['bairro'],
                'estado' =>$data['estado'],
                'cursos' =>'vazio',
                'identificador' =>0,
                'matriculas'=>0,
                'avatar'=>NULL,
                'password' => Hash::make($data['password']),
            ]);
        }
        else  
            return User::create([
                'name' => $data['name'],
                'CPF' => $data['CPF'],
                'email' => $data['email'],
                'cep' =>$data['cep'],
                'rua' =>$data['rua'],
                'cidade' =>$data['cidade'],
                'bairro' =>$data['bairro'],
                'estado' =>$data['estado'],
                'cursos' =>'vazio',
                'identificador' =>1,
                'filmes'=>NULL,
                'avatar'=>$data['avatar'],
                'matriculas'=>0,
                'password' => Hash::make($data['password']),
            ]);
    }

}
