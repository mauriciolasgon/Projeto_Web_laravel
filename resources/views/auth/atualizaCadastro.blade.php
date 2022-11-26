<!doctype html>
<html lang="en">
  <head>
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

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
  </head>
  <body> 
  <div class="container">
  <main>

  <div class="col-md-7 col-lg-8">
  <h4 class="mb-3">Meus dados</h4>
  @if($aux==0)
  <button type="button" class="btn btn-light"><a href="/ver/cadastro/{{1}}">Atualizar dados</a></button>
  <div class="row g-3">
  @if($user->identificador==1)
  <div class="col-sm-6">
              <h6 class="my-0">AVATAR</h6>          
              <img  src= {{ asset( $user->avatar ) }} alt="avatar">
            </div>
  @endif
        <div class="col-sm-6">
              <h6 class="my-0">NOME</h6>          
              <h7>{{$user->name}}</h6>
            </div>

            <div class="col-sm-6">
              <h6 class="my-0">EMAIL</h6>          
              <h7>{{$user->email}}</h6>
            </div>


            <div class="col-sm-6">
              <h6 class="my-0">CPF</h6>          
              <h7>{{$user->CPF}}</h6>
            </div>

            <div class="col-sm-6">
              <h6 class="my-0">CEP</h6>          
              <h7>{{$user->cep}}</h6>
            </div>

            <div class="col-sm-6">
              <h6 class="my-0">RUA</h6>          
              <h7>{{$user->rua}}</h6>
            </div>
            
            <div class="col-sm-6">
              <h6 class="my-0">BAIRRO</h6>          
              <h7>{{$user->bairro}}</h6>
            </div>

            <div class="col-sm-6">
              <h6 class="my-0">CIDADE</h6>          
              <h7>{{$user->cidade}}</h6>
            </div>

            <div class="col-sm-6">
              <h6 class="my-0">ESTADO</h6>          
              <h7>{{$user->estado}}</h6>
            </div>

            @if($user->identificador==0)
            <div class="col-sm-6">
              <h6 class="my-0">FILMES</h6>          
              <h7>{{$user->filmes}}</h6>
            </div>
            @endif
            <a href="/home">Voltar</a>
  
  @else
  <form  method="POST" action="{{ route('atualiza.cadastro',2) }}">
    @csrf
    @if($user->identificador==1)
    <div class="col-lg-4">
        <img  src= {{ asset($user->avatar) }} alt="avatar">
                 <h2 class="fw-normal">Avatar</h2>
                    <p></p>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Selecione um Avatar
                        </a>
                            
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @foreach($avatares as $avatar)
                        <div class="col-lg-4">
                        <img  src= {{ asset( $avatar->path) }} alt="avatar">   
                        <input id="avatar" type="checkbox"  name="avatar" value={{ $avatar->path }} >
                        </div>
                        @endforeach
                        </div>
                    </li>
                    </div>
    @endif
  <div class="row g-3">
            <div class="col-sm-6">
              <label for="nome" class="form-label">Nome</label>
              
              <input type="text" class="form-control"  name="name" id="nome" placeholder="" value="{{$user->name}}" required>
              <div class="invalid-feedback">
                Nome inválido
              </div>
            </div>

            <div class="col-sm-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="" value="{{$user->email}}" required>
              <div class="invalid-feedback">
                Email inválido
              </div>
            </div>

            <div class="col-12">
              <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control"  name="CPF" id="cpf" placeholder="CPF" value="{{$user->CPF}}" required>
              <div class="invalid-feedback">
                  CPF inválido
                </div>
            </div>

            <div class="col-12">
              <label for="cep" class="form-label">CEP</label>
              <input type="text" class="form-control" name="cep" id="cep" value="{{$user->cep}}" placeholder="">
              <div class="invalid-feedback">
               Insira um CEP válido
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Rua</label>
              <input type="text" class="form-control" name="rua" id="rua" value="{{$user->rua}}" placeholder="" required>
              <div class="invalid-feedback">
                Insira sua rua
              </div>
            </div>

            <div class="col-12">
              <label for="bairro" class="form-label">Bairro</label>
              <input type="text" class="form-control" name="bairro" id="bairro" value="{{$user->bairro}}" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="cidade" class="form-label">Cidade</label>
              <input type="text" class="form-control"  name="cidade" id="cidade" value="{{$user->cidade}}" placeholder="Apartment or suite">
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="estado" class="form-label">Estado</label>
              <input type="text" class="form-control"  name="estado"id="estado" value="{{$user->estado}}" placeholder="Apartment or suite">
              <div class="invalid-feedback">
                Insira um estado válido
              </div>
            </div>  

            @if($user->identificador==0)
            <div class="col-md-3">
              <label for="filmes" class="form-label">Filmes</label>
              <input type="text" class="form-control" name="filmes" id="filmes" value="{{$user->filmes}}" placeholder="Apartment or suite">
              <div class="invalid-feedback">
                Digite seus filmes favoritos
              </div>
            </div>
            @endif
          </div>
          <button class="w-100 btn btn-primary btn-lg" type="submit">Atualizar cadastro</button>
        </form>
  @endif
  </div>
      </main>
  </body>
</html>