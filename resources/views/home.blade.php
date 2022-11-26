<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Album example · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    

    
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

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          @if($user->identificador==0)
          <h4 class="text-white">Filmes favoritos</h4>
          <p class="text-muted">{{$user->filmes}}</p>
          @elseif($user->identificador==1)
          <h4 class="text-white">{{$user->name}}</h4>
          <img  src= {{ asset( $user->avatar ) }} alt="avatar">
          @else
          <h4 class="text-white">{{$user->name}}</h4>
          @endif
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Perfil</h4>
          <ul class="list-unstyled">
            @if($user->identificador==1)
            <li><a href="/ver/cadastro/{{0}}" class="text-white">Atualizar cadastro</a></li>
            <li><a href="/redefinir/blade" class="text-white">Redefinir senha</a></li>           
            <li><a href="/view/cursos/{{$user->matriculas}}/{{$user->identificador}}" class="text-white">Ver cursos</a></li>
            <li><a href="{{ route('logout') }}" class="text-white" 
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            </li>
            @endif
            @if($user->identificador==0)
            <li><a href="/ver/cadastro/{{0}}" class="text-white">Atualizar cadastro</a></li>
            <li><a href="/redefinir/blade" class="text-white">Redefinir senha</a></li>
            <li><a href="/view/cursos/{{$user->matriculas}}/{{$user->medias}}" class="text-white">Ver cursos</a></li>
            <li><a href="{{ route('logout') }}" class="text-white" 
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            </li>
            @endif
            @if($user->identificador==2)
            <li><a href="/redefinir/blade" class="text-white">Redefinir senha</a></li>
            <li><a href="/users" class="text-white">Ver alunos e professores</a></li>
            <li><a href="/register/curso" class="text-white">Criar curso</a></li>
            <li><a href="{{ route('logout') }}" class="text-white" 
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            </li>
            @endif
            @if($user->identificador==3)
            <li><a href="/ver/cadastro/{{0}}" class="text-white">Atualizar cadastro</a></li>
            <li><a href="/redefinir/blade" class="text-white">Redefinir senha</a></li>            
            <li><a href="/users" class="text-white">Ver alunos e professores</a></li>
            <li><a href="/view/cursos/{{$user->identificador}}/{{$user->identificador}}" class="text-white">Ver cursos</a></li>
            <li><a href="/register/curso" class="text-white">Criar curso</a></li>
            <li><a href="{{ route('logout') }}" class="text-white" 
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            </li>
            @endif
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"></svg>
        <strong>MAGMA</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>



  
         
  
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @for($i=0;$i< count($cursos);$i++)
        <div class="col">
          <div class="card shadow-sm">
          <img  class="bd-placeholder-img card-img-top" width="100%" height="225"  focusable="false"  xmlns="http://www.w3.org/2000/svg" role="img"  preserveAspectRatio="xMidYMid slice"src= {{ asset( $cursos[$i]->path) }} alt="imagem">
            <text x="50%" y="50%" fill="#eceeef" dy=".3em">
            {{$cursos[$i]->curso}}</text>

            <div class="card-body">
              <p class="card-text">{{$cursos[$i]->descriçao_simplificada}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
              @if($cursos[$i]->aberto_fechado==0)   
                @if($NumParticipantes[$i]<'4')
                <form method="GET" action="/curso/{{$cursos[$i]->id}}/{{0}}">
                  <button type="submit" class="btn btn-sm btn-outline-secondary">View</button>
                </form>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Mínimo de alunos não atingido!</button>
                  @elseif($NumParticipantes[$i]>='10')
                    @if($user->identificador==2 or $user->identificador==3)
                    <form method="GET" action="/curso/{{$cursos[$i]->id}}/{{0}}">
                    <button type="submit" class="btn btn-sm btn-outline-secondary">View</button>
                    </form>
                    @else
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Indisponível</button>
                    @endif
                  <button type="button" class="btn btn-sm btn-outline-secondary">Matriculas encerradas</button>
                  @else
                  <form method="GET" action="/curso/{{$cursos[$i]->id}}/{{0}}">
                  <button type="submit" class="btn btn-sm btn-outline-secondary">View</button>
                  </form>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Curso acontecerá!</button>
                  @endif
              @else
                  @if($user->identificador==2 or $user->identificador==3)
                  <form method="GET" action="/curso/{{$cursos[$i]->id}}/{{0}}">
                  <button type="submit" class="btn btn-sm btn-outline-secondary">View</button>
                  </form>
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Matriculas encerradas</button>
                  @else
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Matriculas encerradas</button>
                  @endif
              @endif
                </div>
                <small class="text-muted">Quantidade de inscritos:{{$NumParticipantes[$i]}}</small>
              </div>
            </div>
          </div>
        </div>
        @endfor
      </div>
    </div>
  </div>

</main>




    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
