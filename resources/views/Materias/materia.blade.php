<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href= {{ asset( "css/materia.css" ) }}>
</head>
<body>
     <div class="box_background"> 
       
         <div class="faixa">
                </div>
                 <div class="caixao"> 
                 <h3>Alunos inscritos na materia:</h3>
                    @for($i=0; $i < count($alunos);$i++)
                      <ul  class="aluno{{$i}}" id="items-list">
                      <li ><ion-icon name="play-outline"></ion-icon> <a href="/Alunos/{{$alunos[$i]}}">{{ $alunos[$i] }}</a></li>
                      </ul>
                    @endfor
                    </div>   
                        <div class="caixa"> 
                            </div> 
                            <div class="ronaldo">
                                </div>
                                <div class="brlogo">
                                    </div>
                                    <h1>Professor: {{$professor}}</h1>
                                    @if($professor=='')
                                     <h2>Sem professor</h2>
                                    @endif
                                        </div>
                                        <h2>{{$materia}}</h2>
     
</body>
</html>