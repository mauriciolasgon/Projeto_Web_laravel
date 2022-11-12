<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Materia;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        return view('auth/register');
        //
    }

    public function welcome()
    {

        return view('welcome');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario= new User;

        $usuario->nome= $request->nome;
        $usuario->filmes= $request->filmes;
        
        $event->save();

        return redirect('/');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        //
    }

    public function verifica(Request $dados)
    {
        $nome="vazio";
        $prof = $dados->profissao;
        return view('auth/register',['prof'=>$prof,'name'=>$nome]);
        
    }
}
