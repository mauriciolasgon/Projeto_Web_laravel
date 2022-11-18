<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $participantes=[];
        $numero_participantes=[];
        $aux=[];
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
                if($participante==NULL)
                {
                    array_push($numero_participantes,0);
                }
                else
                {
                    $aux=explode(';',$participante);
                    $aux=count($aux);
                    array_push($numero_participantes,$aux);
                }
                    
            }

        }
        else
        {
            $numero_participantes=0;
        }
        $user=json_decode($user);

        return view('home',['user'=>$user,'cursos'=>$cursos,'NumParticipantes'=>$numero_participantes]);
    }

    public function redefinirSenha()
    {
        return view('auth.passwords.reset');
    }

}
