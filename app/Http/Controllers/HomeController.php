<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function redefinirBlade(Request $email)
    {   
        $user=Auth::user();
        
        return view('auth.passwords.reset',['user'=>$user,'aux'=>$email->email]);
    }

    public function redefinirSenha(Request $password)
    {
        $password=Hash::make($password->password);
        
        $user=Auth::user();
        
        User::find($user->id)->update(['password' => $password]);
        return redirect('/home');

    }
    // Secretaria cria usuario
    public function criaUser(Request $data)
    {
        if($data['profissao']=='Aluno') {
             User::create([
                'name' => $data['name'],
                'CPF' => $data['CPF'],
                'email' => $data['email'],
                'cep' =>$data['cep'],
                'filmes' =>$data['filmes'],
                'rua' =>$data['rua'],
                'cidade' =>$data['cidade'],
                'bairro' =>$data['bairro'],
                'estado' =>$data['estado'],
                'cursos' =>'vazio',
                'identificador' =>0,
                'matriculas'=>0,
                'avatar'=>NULL,
                'password' => Hash::make($data['password']),
            ]);
        }
        elseif($data['profissao']=='Professor')  
                 User::create([
                'name' => $data['name'],
                'CPF' => $data['CPF'],
                'email' => $data['email'],
                'cep' =>$data['cep'],
                'rua' =>$data['rua'],
                'cidade' =>$data['cidade'],
                'bairro' =>$data['bairro'],
                'estado' =>$data['estado'],
                'cursos' =>'vazio',
                'identificador' =>1,
                'filmes'=>NULL,
                'avatar'=>$data['avatar'],
                'matriculas'=>0,
                'password' => Hash::make($data['password']),
            ]);
        else
                // aux determina para onde devo ser direcionado
                $aux=1;
                Curso::create([
                'curso' => $data['name'],
                'descriçao_simplificada' => $data['ds'],
                'descrição_completa' => $data['dc'],
                'alunos' =>NULL,
                'docentes' =>NULL,
                'aberto_fechado'=>0,
        ]);
        if($aux==1)
        {
            return redirect('/home');  
        }
        return redirect('/users');
    }

    public function showUserCursos($userMatriculas,$medias)
    {   
        $cursos=Curso::all();

        // pega os cursos do usuario
        // e a media do usuario em cada curso
        $medias=explode(':',$medias);
        $userMatriculas=explode(';',$userMatriculas);
        $meusCursos=[];
        $minhasMedias=[];
        foreach($userMatriculas as $matriculas)
        {
            for($i=0;$i<count($medias);$i+=2)
            {
                if($matriculas==$medias[$i])
                {   
                    array_push($minhasMedias,$medias[$i+1]);
                }
            } 
            foreach($cursos as $curso)
            {
                if($matriculas==$curso->id)
                {
                    array_push($meusCursos,$curso);

                }
            }    
        }

        return view('userCurso',['medias'=>$minhasMedias,'cursos'=>$meusCursos]);
    }

        //VÊ todoos os usuarios
    public function showIntegrantesView()
    {
        $alunos=[];
        $profs=[];
        $users=User::all();
        foreach($users as $user)
        {
            if($user->identificador==0)
            {
                array_push($alunos,$user);
            }
            elseif($user->identificador==1)
            {
                array_push($profs,$user);
            }
        }
        return view('Alunos.aluno',['alunos'=>$alunos,'profs'=>$profs]);
    }
    public function showRegisterCursoView()
    {
        return view('auth/registerCurso');
    }
}
