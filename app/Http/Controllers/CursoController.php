<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CursoController extends Controller
{

    public function index($id,$aux2)
    {

        $user=Auth::user();
        $name=$user->name;
        $jsonUser=$user;
        $user=json_decode($user);
        //cria vetor das matriculas do aluno
        $matriculas=$user->matriculas;
        
        // Acha o curso selecionado
        $cursos=Curso::all();
        $cursos=json_decode($cursos);
        
        foreach($cursos as $aux)
        {
            if($id == $aux->id)
            {
                $curso=$aux;
            }
        }
        //atualiza a pagina com informações do banco de dados
    
        $usuarios=User::all(); 

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

        // Determina se o usuario esta matriculado/lecionando
        foreach($matriculas as $matricula)
        {
            if($matricula==$curso->id)
            {
                $matriculado=1;
                
            }
        }
        if($user->id==1)
            if($curso->docentes!=$user->name and $curso->docentes!="vazio")
            {
                $matriculado=3;
            }
        //pega o avatar o professor que leciona a matéria
        $img="img\avatarProf\avatar-padrão.png";
        foreach($usuarios as $usuario)
        {
            if($usuario->identificador==1)
            {
                if($curso->docentes==$usuario->name)
                {
                    $img=$usuario->avatar;
                }
                
            }
        }
        // pega os alunos do curso
        $alunos=explode(';',$curso->alunos);
        $alunosAux=implode(';',$alunos);

       return view('curso',['curso'=>$curso,'user'=>$user,'matriculado'=>$matriculado,'jsonUser'=>$jsonUser,'img'=>$img,'alunos'=>$alunos,'aux'=>$aux2,'alunosAux'=>$alunosAux]);
    }
    //
    public function AddAlunos($cursoid)
    {

        $user=Auth::user();
        //matricula alunos e atribui professores aos cursos
        $alunos=[];
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
            if($curso->alunos!=NULL)
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
            }
            array_push($alunos, $nome);
            $alunos=implode(";", $alunos);
            $matriculas=implode(";", $matriculas);
            
            Curso::find($cursoid)->update(['alunos' => $alunos]);
            User::find($user->id)->update(['matriculas' => $matriculas]);
            User::find($user->id)->update(['medias' => "$cursoid:"]);
        }
        else
        {
            $matriculas=implode(";", $matriculas);
            Curso::find($cursoid)->update(['docentes'=> $user->name]);
            User::find($user->id)->update(['matriculas' => $matriculas]);
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
        $filmes=[];
        $cursos=Curso::all();
        for($i=0;$i<count($cursos);$i++)
        {
            if($cursos[$i]->id == $cursoid)
            {  
                $curso=$cursos[$i];
            }
        }
        // Pega os filmes de cada aluno
        $users=User::all();
        $alunos=$curso->alunos;
        $alunos=explode(';',$alunos);
        foreach($alunos as $aluno)
        {
            foreach($users as $user)
            {
                if($aluno==$user->name)
                {
                    array_push($filmes,$user->filmes);
                }
            }
        } 
        return view('Alunos.aluno',['alunos'=>$alunos,'filmes'=>$filmes]);
    }

    public function removeAlunos($cursoId)
    {
        $user=Auth::user();
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
            User::find($user->id)->update(['matriculas' => $matriculas]);
        }

        return redirect()->back();
    }

    public function alteraMedias(Request $newMedias,$alunos,$cursoid)
    {       
            $novaMedia=[];
            foreach($newMedias as $newMedia)
            {
                array_push($novaMedia,$newMedia);
            }
            dd($novaMedia);
            $users=User::all();
            $medias=[];
            
            $alunos=explode(';',$alunos); 
            foreach($users as $user)
            {
                foreach($alunos as $aluno)
                {
                    if($aluno==$user->name)
                    {
                        $medias=$user->medias;
                        $medias=explode(";",$medias);
                        $medias=implode(":",$medias);
                        $medias=explode(":",$medias);
                        for($i=0;$i<((count($medias)/2)-1);$i+=2)
                        {
                            if($medias[$i]==$cursoid)
                            {
                                $media[$i+1];
                            }
                        }
                        dd($medias);
                        
                    }
                    
                }
            }
            
        dd($medias);
            for($i=0;$i<count($alunos);$i++)
            {
                $medias=explode(";",$medias[$i]);

            }
            

    }

}
