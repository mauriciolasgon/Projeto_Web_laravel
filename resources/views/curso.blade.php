<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Offcanvas navbar template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/offcanvas-navbar/">

    

    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href={{ asset( "css/offcanvas.css" ) }} rel="stylesheet">
  </head>
  <body class="bg-light">
    
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{$curso->curso}}</a>
    <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
   
    @if($user->identificador==0)
        @if($matriculado==1)
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inscrito</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/add/aluno/{{$curso->id}}/{{'vazio'}}/{{0}}">Inscrever-se</a>
        </li>
        @endif  
    @elseif($user->identificador==1)
        @if($matriculado==1)
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Lecionando</a>
        </li>
        @elseif($matriculado==0)
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/add/aluno/{{$curso->id}}/{{'vazio'}}/{{0}}">Lecionar</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Não é possível lecionar</a>
        </li>
        @endif
    @else
        @if($indicador==1)
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Matrículas encerradas</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/encerra/matricula/{{$curso->id}}/{{1}}">Encerrar matrículas</a>
        </li>
        @endif
    @endif
      <li class="nav-item">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
            
        <li class="nav-item">
          <a class="nav-link" href="/integrantes/{{$curso->id}}">Pessoas</a>
        </li>

        @if($user->identificador==0)
        <li class="nav-item">
          <a class="nav-link" href="#">Nota</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="#">Nota dos Alunos</a>
        </li>
        @endif
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/remove/aluno/{{$curso->id}}/{{'vazio'}}/{{0}}">Desmatricular-se</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="nav-scroller bg-body shadow-sm">
  <nav class="nav" aria-label="Secondary navigation">
    <a class="nav-link active" aria-current="page" href="/home">Voltar</a>
    <a class="nav-link" href="#">
      Friends
      <span class="badge text-bg-light rounded-pill align-text-bottom">27</span>
    </a>
    <a class="nav-link" href="#">Explore</a>
    <a class="nav-link" href="#">Suggestions</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
  </nav>
</div>

<main class="container">
  <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
    <img class="me-3" src= {{ asset($img) }} alt="" width="48" height="38">
    <div class="lh-1">
      <h1 class="h6 mb-0 text-white lh-1">Professor</h1>
    @if($curso->docentes!=NULL)
      <small>{{$curso->docentes}}</small>
      @if($user->identificador==2)
      <small><a class="nav-link" href="/remove/aluno/{{$curso->id}}/{{$curso->docentes}}/{{1}}">Remover</a></small>
      @endif
    @else
      <small>Sem atribuição de professor até o momento!</small>
      @if($user->identificador==2)
      <small><a  class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Adicionar professor</a>
          <ul class="dropdown-menu">
            @foreach($profLivres as $aux)
            <li><a class="dropdown-item" href="/add/aluno/{{$curso->id}}/{{$aux}}/{{1}}">{{$aux}}</a></li>
            @endforeach
          </ul></small>
      @endif
    @endif
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Sobre o curso:</h6>
    <div class="d-flex text-muted pt-3">
 
      <p class="pb-3 mb-0 small lh-sm border-bottom">
        {{$curso->descrição_completa}}
      </p>
    </div>
    <div class="d-flex text-muted pt-3">

  </div>
@if($user->identificador==0 and $matriculado==1)
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Notas</h6>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Prova 1</strong>

        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
    </div>
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Atividade</strong>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="d-flex text-muted pt-3">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      </div>
      <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
        <div class="d-flex justify-content-between">
          <strong class="text-gray-dark">Prova 2</strong>
          
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
  </div>
@elseif($user->identificador==1 and $matriculado==1)
  @if($aux==0)
  <form method="GET" action="/medias/{{$curso->id}}/{{1}}">
  @else
  <form method="POST" action="/atribui/medias/{{$alunosAux}}/{{$curso->id }}">
  @endif
  @csrf
  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Notas</h6>
  <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Aluno</th>
            <th scope="col">Média</th>
            @if($aux==0) 
            <th scope="col"><button class="btn btn-outline-success" type="submit">Alterar médias</button></th>
            @else
            <th scope="col"><button class="btn btn-outline-success" type="submit">Atribuir médias</button></th>
            @endif
          </tr>
        </thead>
    <tbody>
      @for($i=0;$i< count($alunos);$i++)
          <tr>
            <td>{{$alunos[$i]}}</td>
            @if($aux==0)
            <td>{{$medias[$i]}}</td>
            @else
            <td><input id="name" type="number"  name="{{$i}}" value="{{ old('$i') }}"></td>
            @endif
          </tr>
          
      @endfor
    </tbody>
    </div> 
    </form> 
@elseif($user->identificador==2)
  <div class="my-3 p-3 bg-body rounded shadow-sm">
  <h6 class="border-bottom pb-2 mb-0">% de aprovados: {{$situação[0]}}%</h6>
  <h6 class="border-bottom pb-2 mb-0">% de reprovados: {{$situação[1]}}%</h6>
  <h6 class="border-bottom pb-2 mb-0">Média da sala : {{$mediaTotal}}</h6>
    <h6 class="border-bottom pb-2 mb-0">Notas</h6>
  <div class="table-responsive">
    
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Aluno</th>
            <th scope="col">Média</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
    <tbody>
      @for($i=0;$i< count($alunos);$i++)
          <tr>
            <td>{{$alunos[$i]}}</td>
            <td>{{$medias[$i]}}</td>
            @if($medias[$i]>=5)
            <td><span class="btn btn-success">Aprovado</span></td>
            @else
            <td><span class="btn btn-danger">Reprovado</span></td> 
            @endif
            <td><a class="btn btn-primary" href="/remove/aluno/{{$curso->id}}/{{$alunos[$i]}}/{{1}}">Remover</a></td> 
            </tr>
      @endfor
      <td><a class="btn btn-primary" href="#" data-bs-toggle="dropdown" aria-expanded="false">Adicionar alunos  ⇣</a>
          <ul class="dropdown-menu">
            @foreach($alunoNaoCadastro as $aux)
            <li><a class="dropdown-item" href="/add/aluno/{{$curso->id}}/{{$aux}}/{{1}}">{{$aux}}</a></li>
            @endforeach
          </ul></td>
      </tbody> 
      </div> 

@endif
  
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script type="text/javascript" src={{ asset("js/dashboard.js") }}></script>
      
  </body>
</html>
