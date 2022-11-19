<?php

namespace App\Http\Controllers;
use App\Models\Curso;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index($id,$identificador,$name)
    {
        $cursos=Curso::all();
        $cursos=json_decode($cursos);
        foreach($cursos as $aux)
        {
            if($id == $aux->id)
            {
                $curso=$aux;
            }
        }

       return view('curso',['curso'=>$curso,'identificador'=>$identificador,'name'=>$name]);
    }
    //
    public function AddAlunos($nome,$cursoid)
    {
        $alunos=[];
        $cursos=Curso::all();
        for($i=0;$i<count($cursos);$i++)
        {
            if($cursos[$i]->id == $cursoid)
            {  
                $curso=$cursos[$i];
            }
        }
        array_push($alunos, $curso->alunos);
        foreach($alunos as $aluno)
        {
            if($aluno==$nome)
            {
                dd('erro');
            }
            array_push($alunos, $nome);
        }
        Curso::find($cursoid)->update(['alunos' => $alunos]);
       
        #terminar essa função
    }
}
