<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;

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
    public function index($user)
    {    
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
                $aux=explode(';',$participante);
                $aux=count($aux);
                array_push($numero_participantes,$aux);
            }
        }
        else
        {
            $numero_participantes=0;
        }

        $user=json_decode($user);
        $name=$user->name;
        $jsonUser=json_encode($user);
        
        return view('home',['name'=>$name,'user'=>$user,'cursos'=>$cursos,'NumParticipantes'=>$numero_participantes,'jsonUser'=>$jsonUser]);
    }
}
