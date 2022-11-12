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
                'password' => Hash::make($data['password']),
            ]);
        }
        else  
            return Professor::create([
                'name' => $data['name'],
                'CPF' => $data['CPF'],
                'email' => $data['email'],
                'cep' =>$data['cep'],
                'rua' =>$data['rua'],
                'cidade' =>$data['cidade'],
                'bairro' =>$data['bairro'],
                'estado' =>$data['estado'],
                'curso' =>'vazio',
                'identificador' =>1,
                'matriculas'=>0,
                'password' => Hash::make($data['password']),
            ]);
    }



    // Registra professores
    public function profregister(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->profguard('professor')->login($user);
        return $this->profregistered($request, $user)
            ?: redirect()->intended('professores/dashboard/{{$user}}');
    }

     /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function profguard()
    {   
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function profregistered(Request $request, $user)
    {
        //
    }
}
