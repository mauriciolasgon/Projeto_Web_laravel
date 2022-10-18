<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href={{ asset( "css/aluno.css" ) }}>
</head>
<body>
     <div class="box_background"> 
         <div class="faixa">
             <h1>Filme favoritos do {{$aluno}}</h1>
             <h2>Dados do aluno:</h2>
             @foreach($dados as $dado)
             <ul>
              <li><ion-icon name="play-outline"></ion-icon><h2>{{$dado}}</h2><l1>
             </ul>
             @endforeach
                </div>           
                 <div class="cartaz">
                     </div>
                     <div class="{{$filmes[$i-1]}}">
                        </div>
                            <div class="{{$filmes[$i-2]}}">
                             </div>
                                 <div class="{{$filmes[$i-3]}}">
                                 </div>
                         
                       
</body>
</html>