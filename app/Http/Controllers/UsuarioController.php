<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materia;
use App\Models\Avatar;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/auth/register');
        //
    }

    public function welcome()
    {
        return view('welcome');
        //
    }


    public function show($materia)
    {
        $usuario = User::all();
        $materiass= Materia::all();
        $professor='';
        for($j=0; $j < count($materiass);$j++){
            for($i=0; $i < count($usuario);$i++){
                if(stripos($materiass[$j]->alunos, $usuario[$i]->name)>=0 && $usuario[$i]->identificador==0 && $materiass[$j]->materias==$materia){
                    $alunos=$materiass[$j]->alunos;
                    $aluno=explode(';',$alunos);
                }
                elseif(stripos($materiass[$j]->professores, $usuario[$i]->name)>=0 && $usuario[$i]->identificador==1 && $materiass[$j]->materias==$materia){
                    $professor=$materiass[$j]->professores;
                }
            }       
        }
        return view('Materias.materia', ['usuarios' => $usuario,'materia'=>$materia,'materiass'=>$materiass,'alunos'=>$aluno,'professor'=>$professor]);
        //
    }
    public function show_aluno($aluno){

        $usuario= User::all();
        $filme='';
        $dados=[];
        for($i=0; $i < count($usuario);$i++){
            if($usuario[$i]->name == $aluno){
                $filme=$usuario[$i]->filmes;
                $filme=explode(';',$filme);
                $j=count($filme);
                array_push($dados,$usuario[$i]->email,$usuario[$i]->RAP);
            }
    
            
        }
        return view('Alunos.aluno',['i'=>$j,'aluno'=>$aluno,'filmes'=>$filme,'dados'=>$dados]);
    }



    public function verifica(Request $dados,$aux)
    {
# aux indica se a secretaria esta cadastrando usuarios
# se aux=1, cria aluno/ se aux=2,cria professor    
        if($aux==1)
        {
            $prof='Aluno';
        }
        elseif($aux==2)
        {
            $prof='Professor';
        }
        else
        {
            $prof=$dados->profissao;
        }

        if($prof=='Professor')
        {
            $avatares=Avatar::all();
            return view('auth/registerProf',['prof'=>$prof,'name'=>'vazio','avatares'=>$avatares,'aux'=>$aux]);

        }
        else
        {
            return view('auth/register',['prof'=>$prof,'name'=>'vazio','aux'=>$aux]);
        }
        
    }

   

    
}
