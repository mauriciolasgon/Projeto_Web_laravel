<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Curso;

class ProfessorController extends Controller
{
    public function login(){


        // $cliente = new Cliente;
        // $cliente->name = "Jean Carlos";
        // $cliente->email = "jeancarloscharao@gmail.com";
        // $cliente->password = Hash::make("12345678");
        // $cliente->save();
        $aux=0;
        return view('/auth/login',['aux'=>$aux,'name'=>'vazio']);



    }

    public function logar(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $usuarios=Professor::all();
        foreach($usuarios as $usuario)
        {
            if($usuario->email == $credentials['email'])
            {
                
                $user=$usuario;
            }

        }
        if (Auth::guard('professor')->attempt($credentials)) {;
            $request->session()->regenerate();
            return redirect()->intended("/professores/dashboard/{$user}");
        }
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');

    }


    public function dashboard($user)
    {   
        $participantes=[];
        $numero_participantes=[];
        $cursos=Curso::all();
        $cursos=json_decode($cursos);
        
        if($cursos!=0)
        {
            foreach($cursos as $curso)
            {
                array_push($participantes,$curso->alunos);
            }   
            
            foreach($participantes as $participante)
            {
                $aux=explode(';',$participante);
                $aux=count($aux);
                array_push($numero_participantes,$aux);
            }
        }
        else
        {
            $numero_participantes=0;
        }
        $jsonUser=$user;
        $user=json_decode($user);
        $name=$user->name;

        return view('home',['name'=>$name,'user'=>$user,'cursos'=>$cursos,'NumParticipantes'=>$numero_participantes,'jsonUser'=>$jsonUser]);
    }

    public function logout(Request $request)
    {
        Auth::guard('professor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/professores/login');
    }

}
