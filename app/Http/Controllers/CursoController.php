<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\User;
use App\Models\Professor;


use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index($id,$user,$name,)
    {
        $jsonUser=$user;
        $user=json_decode($user);
        //cria vetor das matriculas do aluno
        $matriculas=$user->matriculas;
        //atualiza a pagina com informações do banco de dados
        
        if($user->identificador==1)
        {

            $usuarios=Professor::all(); 
        }
        else
        {
            $usuarios=User::all(); 
        }
        //cria vetor das matriculas do aluno
        foreach($usuarios as $usuario)
        {
            if($usuario->id == $user->id)
            {
                $matriculas=$usuario->matriculas;

            }
        }
        $matriculado=0;
        $matriculas=explode(';',$matriculas);
        $profs=Professor::all();
        $cursos=Curso::all();
        $cursos=json_decode($cursos);
        // Acha o curso selecionado
        foreach($cursos as $aux)
        {
            if($id == $aux->id)
            {
                $curso=$aux;
            }
        }
        // Determina se o usuario esta matriculado ou lecionando
        foreach($matriculas as $matricula)
        {
            if($matricula==$curso->id)
            {
                $matriculado=1;
            }
        }
        if($curso->docentes!=$user->name and $curso->docentes!="vazio")
        {
            $matriculado=3;
        }
        //pega o avatar o professor que leciona a matéria
        foreach($profs as $prof)
        {
            if($prof->name==$curso->docentes)
            {
                $img=$prof->avatar;
            }
            else
            {
                $img="img\avatarProf\avatar-padrão.png";
            }
        }

       return view('curso',['curso'=>$curso,'user'=>$user,'matriculado'=>$matriculado,'jsonUser'=>$jsonUser,'img'=>$img]);
    }
    //
    public function AddAlunos($user,$cursoid)
    {
        //matricula alunos e atribui professores aos cursos
        $user=json_decode($user);
        $nome=$user->name;
        $matriculas=$user->matriculas;
        $matriculas=explode(';',$matriculas); 
        $cursos=Curso::all();
        for($i=0;$i<count($cursos);$i++)
        {
            if($cursos[$i]->id == $cursoid)
            {  
                $curso=$cursos[$i];
            }
        }
        array_push($matriculas, "$curso->id");
        
        if($user->identificador==0)
        {
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
            $matriculas=implode(";", $matriculas);
            
            Curso::find($cursoid)->update(['alunos' => $alunos]);
            User::find($user->id)->update(['matriculas' => $matriculas]);
        }
        else
        {
            $matriculas=implode(";", $matriculas);
            Curso::find($cursoid)->update(['docentes'=> $user->name]);
            Professor::find($user->id)->update(['matriculas' => $matriculas]);
        }
        
        return redirect()->back();
       
        #terminar essa função
    }
    public function back()
    {
        return redirect()->back();
    }

    //Vai para a pagina de integrantes do curso
    public function showIntegrantesView($cursoid)
    {

        $cursos=Curso::all();
        for($i=0;$i<count($cursos);$i++)
        {
            if($cursos[$i]->id == $cursoid)
            {  
                $curso=$cursos[$i];
            }
        }
        $users=User::all();
        foreach($users as $aux)
        {
            
        }
        $alunos=$curso->alunos;
        $alunos=explode(';',$alunos);
        return view('Alunos.aluno',['alunos'=>$alunos]);
    }

    public function removeAlunos($cursoId,$jsonUser)
    {
        //Remove a matricula do aluno e do professor
        $cursos=Curso::all();
        $cursos=json_decode($cursos);
        foreach($cursos as $aux)
        {
            if($aux->id==$cursoId)
            {
                $curso=$aux;
            }
        }
        
        $user=json_decode($jsonUser);
        
        if($user->identificador==0)
        {
            $alunos=$curso->alunos;
            $alunos=explode(';',$alunos);
            for($i=0;$i<count($alunos);$i++)
            {
                if($alunos[$i]==$user->name)
                {
                    unset($alunos[$i]);
                }
            }
            $alunos=implode(";", $alunos);
            Curso::find($curso->id)->update(['alunos' => $alunos]);
        }
        else
        {
            Curso::find($curso->id)->update(['docentes'=>"vazio"]);
        }
        //remove o registro de matricula do usuario
        $matriculas=$user->matriculas;
        $matriculas=explode(';',$matriculas);
        for($i=0;$i<count($matriculas);$i++)
        {
            if($matriculas[$i]==$curso->id)
            {
                unset($matriculas[$i]);
            }
        }
        $matriculas=implode(";", $matriculas);
        if($user->identificador==0)
        {
            User::find($user->id)->update(['matriculas' => $matriculas]);
        }
        else
        {
            Professor::find($user->id)->update(['matriculas' => $matriculas]);
        }

        return redirect()->back();
    }
}
