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
# aux2 indica a rota que deve ser tomada-No caso de alterar medias- Visao do professor
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
        //cria vetor das matriculas do aluno e pega alunos nao cadastrados no curso
        $alunosNaoCadastrados=[];
        $professoresNaoCadastrados=[];
        foreach($usuarios as $usuario)
        {   
            $salto=0;
            if($usuario->id == $user->id)
            {
                $minhaMedia=0;
                $matriculas=$usuario->matriculas;
                $minhasMedias=$user->medias;
                $minhasMedias=explode(":",$minhasMedias);
                if(count($minhasMedias)==2)
                    {
                        $numeroSaltos=1;
                    }
                else
                {
                    $numeroSaltos=(count($minhasMedias)/2);
                }
                    // percorre o vetor somento nos indices pares (onde esta o id do curso)
                
                if($user->identificador==3)
                {
                    $minhaMedia="ADM";
                }
                for($j=0;$j<$numeroSaltos;$j++)
                {
                    if($minhasMedias[$salto]==$id)
                    {
                        $minhaMedia=$minhasMedias[$salto+1];
                        
                    }
                        // pula para o próximo indice par
                    $salto+=2;
                    
                }
            }
            //pega alunos ou professores nao cadastrados no curso
            else
            {   
                $indice=0;
                $matriculasProvisorias=$usuario->matriculas;
                $matriculasProvisorias=explode(';',$matriculasProvisorias);
                foreach($matriculasProvisorias as $prov)
                {
                    if($prov==$curso->id)
                    {
                        // determina se o usuario esta matriculado no curso
                        $indice=1;
                    }
                }
                if($indice!=1 and $usuario->identificador==0)
                {
                    array_push($alunosNaoCadastrados,$usuario->name);
                }
                elseif($indice!=1 and $usuario->identificador==1)
                {   
                    array_push($professoresNaoCadastrados,$usuario->name);
                }

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
        $alunos=explode(';',$curso->alunos);
        $alunosAux=implode(';',$alunos);
        $aux=0;
        // pega a media dos alunos
        if($alunos[0]=="")
        {
            $medias=[0];
        }
        else
        {
            $medias=[];
        }
        
        for($i=0;$i<count($alunos);$i++)
        {
            $salto=0;
            foreach($usuarios as $usuario)
            {
                if($alunos[$i]==$usuario->name)
                {
                    $mediass=$usuario->medias;
                    $mediass=explode(":",$mediass);
                    if(count($mediass)==2)
                    {
                        $numeroSaltos=1;
                    }
                    else
                    {
                        $numeroSaltos=(count($mediass)/2);
                    }
                    // percorre o vetor somento nos indices pares (onde esta o id do curso)
                    for($j=0;$j<$numeroSaltos;$j++)
                    {
                        if($mediass[$salto]==$id)
                        {

                            array_push($medias,$mediass[$salto+1]);
                            
                        }
                        // pula para o próximo indice par
                        $salto+=2;
                    }   
                }
            }    
        }
        
        // calcula a media das medias e a procentagem de arpovados e repovados
        $mediatotal=0;
        $aprovados=0;
        $reprovados=0;
        // aprovados estao no indice 0 e reprovados no indice 1
        $situação=[];
        foreach($medias as $media)
        {
            if($media>=5)
            {
                $aprovados++;
            }
            else
            {
                $reprovados++;
            }
            $mediatotal=$media+$mediatotal;
        }
        array_push($situação,($aprovados/count($alunos))*100,($reprovados/count($alunos))*100);
        $mediatotal=$mediatotal/count($alunos);
        // mostra se a matricula do curso esta em aberto ou fechada
        $indicador=$curso->aberto_fechado;


       return view('curso',['curso'=>$curso,'user'=>$user,'matriculado'=>$matriculado,'jsonUser'=>$jsonUser,'img'=>$img,'alunos'=>$alunos,'aux'=>$aux2,'alunosAux'=>$alunosAux,'medias'=>$medias,'alunoNaoCadastro'=>$alunosNaoCadastrados,'indicador'=>$indicador,'profLivres'=>$professoresNaoCadastrados,'mediaTotal'=>$mediatotal,'situação'=>$situação,'minhaMedia'=>$minhaMedia]);
    }
    
    //
    public function AddAlunos($cursoid,$nameAluno,$aux)
    {
# aux define se a secretaria esta adicionando aluno ou se a secretaria esta adicionando
# alunos no curso- se aux=1 requisição secretaria
        if($aux==0)
        {
            $user=Auth::user();
        }
        else
        {
            $users=User::all();
            foreach($users as $us)
            {
                if($us->name==$nameAluno)
                {
                    $user=$us;
                }
            }
        }
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
            
            $verNULL=$user->medias;
            $medias=[];
            if($verNULL!=NULL)
            {   
                $medias=$user->medias;
                $medias=explode(':',$medias);
            }

            array_push($medias,$cursoid);
            array_push($medias,0);
            $medias=implode(':',$medias);

            
            Curso::find($cursoid)->update(['alunos' => $alunos]);
            User::find($user->id)->update(['matriculas' => $matriculas,'medias' => $medias]);
        }
        else
        {
            $matriculas=implode(";", $matriculas);
            Curso::find($cursoid)->update(['docentes'=> $user->name]);
            User::find($user->id)->update(['matriculas' => $matriculas]);
        }
        
        return redirect()->back();
       
    }
    public function back()
    {
        return redirect()->back();
    }


    public function removeAlunos($cursoId,$nameAluno,$aux)
    {
# aux define se a secretaria esta adicionando aluno ou se a secretaria esta adicionando
# alunos no curso  - se aux=1 requisição secretaria
        
        if($aux==0)
        {
            $user=Auth::user();
        }
        else
        {
            $users=User::all();
            foreach($users as $us)
            {
                if($us->name==$nameAluno)
                {
                    $user=$us;
                }
            }
        }
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
            Curso::find($curso->id)->update(['docentes'=>NULL]);
        }
        //remove o registro de matricula do usuario e sua media
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
            $salto=0;
            $medias=$user->medias;
            $medias=explode(':',$medias);
            if(count($medias)==2)
            {
                $numeroSaltos=1;
            }
            else
            {
                $numeroSaltos=(count($medias)/2);
            }
            for($i=0;$i<$numeroSaltos;$i++)
            {
                if($medias[$salto]==$cursoId)
                {
                    unset($medias[$salto]);
                    unset($medias[$salto+1]);  
                }
                $salto+=2;
            } 
        
            $medias=implode(':',$medias);
            User::find($user->id)->update(['matriculas' => $matriculas,'medias' => $medias]);

        }
        else
        {
            User::find($user->id)->update(['matriculas' => $matriculas]);
        }

        return redirect()->back();
    }

    
    public function alteraMedias(Request $newMedias,$alunos,$cursoid)
    {       
            $novaMedias=[];
            $novaMedia=[];
            //auxiliar que percorre o array dos inputs
             $j=1;
            // Pega os dados do input e os coloca em um array 
            foreach($newMedias as $newMedia)
            {
                array_push($novaMedias,$newMedia);
            }
            $novaMedias=$novaMedias[1];
            foreach($novaMedias as $nova)
            {
                array_push($novaMedia,$nova);
                
            }
            //retira o token do array
            unset($novaMedia[0]);
            //atualiza o banco de dados
            $users=User::all();
            $medias=[];
            $alunos=explode(';',$alunos);
            foreach($alunos as $aluno)
            {
                foreach($users as $user)
                {
                    // faz um array das medias, as quais estao organizadas em grupos de 2, sendo o primeiro numero, o id do curso e o 
                    // segundo a media naquele curso

                    if($aluno==$user->name)
                    {
                        $salto=0;
                        $mediass=$user->medias;
                        $mediass=explode(":",$mediass);
    
                        if(count($mediass)==2)
                        {
                            $numeroSaltos=1;
                        }
                        else
                        {
                            $numeroSaltos=(count($mediass)/2);
                        }
                        for($i=0;$i<$numeroSaltos;$i++)
                        {
                            if($mediass[$salto]==$cursoid)
                            {
                                $mediass[$salto+1]=$novaMedia[$j];
                                $medias=implode(":",$mediass);
                                User::find($user->id)->update(['medias' => $medias]);                        
                                $j++;
                            }
                            $salto+=2;
                        }   
                    }
                }
            }
            
            return redirect("/curso/{$cursoid}/0");      
    }
    public function encerraMateria($cursoid,$indicador)
    {
        Curso::find($cursoid)->update(['aberto_fechado' => $indicador]); 
        return redirect()->back();
    }

    public function removeUser($userid,$aux)
    {
        // primeiro retira-se o usuario do curso e depois ele é deletado do banco
        // aux determina se o usuário deletado foi um aluno(aux=0) ou professor(aux=1)

        $cursos=Curso::all();
        $users=User::all();
        
        foreach($users as $us)
        {
            if($us->id==$userid)
            {
                $user=$us;
            }
        }

        foreach($cursos as $curso)
        {
            if($aux==0)
            {
                $alunos=$curso->alunos;
               
                $allunos=explode(";",$alunos);
                
                for($i=0;$i<count($allunos);$i++)
                {
                    if($allunos[$i]==$user->name)
                    {
                        unset($allunos[$i]);
                        $alunos=implode(";",$allunos);
                        
                        Curso::find($curso->id)->update(['alunos' =>$alunos]);
    
                    }
                }
                
            }
            else
            {
                $prof=$curso->docentes;              
                if($prof==$user->name)
                {
                    Curso::find($curso->id)->update(['docentes' =>NULL]);
    
                }
            }
        }
           
        User::where('id', $userid)->firstorfail()->delete();            
        return redirect()->back();
        

    }

    
}
