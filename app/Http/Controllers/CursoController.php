<?php

namespace App\Http\Controllers;
use App\Models\Curso;

use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index($id,$user,$name,)
    {
        $user=json_decode($user);
        dd($user);
        $cursos=Curso::all();
        $cursos=json_decode($cursos);
        foreach($cursos as $aux)
        {
            if($id == $aux->id)
            {
                $curso=$aux;
            }
        }

       return view('curso',['curso'=>$curso,'user'=>$user]);
    }
    //
    public function AddAlunos($nome,$cursoid)
    {
 
        $cursos=Curso::all();
        for($i=0;$i<count($cursos);$i++)
        {
            if($cursos[$i]->id == $cursoid)
            {  
                $curso=$cursos[$i];
            }
        }
        $alunos=$curso->alunos;
        $alunos=explode(';',$alunos);
        foreach($alunos as $aluno)
        {
            if($aluno==$nome)
            {
                return redirect()->back();
            }
        }
        array_push($alunos, $nome);
        $alunos=implode(";", $alunos);
       
        Curso::find($cursoid)->update(['alunos' => $alunos]);

        return redirect()->back();
       
        #terminar essa função
    }
    public function back()
    {
        return redirect()->back();
    }

    public function integrantes($cursoid)
    {
         
        $cursos=Curso::all();
        for($i=0;$i<count($cursos);$i++)
        {
            if($cursos[$i]->id == $cursoid)
            {  
                $curso=$cursos[$i];
            }
        }


    }
}
