<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>  
        img{
        background-color: #ddd;
        border-radius: 10%;
        height: 80px;
        object-fit: center;
        width: 80px;  
        }
</style>
</head> 
<body> 
<main class="py-4">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                @if($aux!=2)
                <form method="POST" action="{{route('verifica',0)}}">
                    @csrf
                        <div class="row mb-3">
                            <label for="profissao" class="col-md-4 col-form-label text-md-end">{{ __('Profissão') }}</label>

                            <div class="col-md-6">
                            <select id="profissoes" name="profissao">
                            <option value="Professor">Professor</option>
                                <option value="Aluno">Aluno</option>
			                    
                            </select>
                            <button type="submit" class="btn btn-primary" >Selecionar</button>
                            </div>
                        </div>
                    </form>  
                @endif
                @if($aux==2)
                <form method="POST" action="{{ route('cria.users') }}">
                @else
                <form method="POST" action="{{ route('register') }}">
                @endif
                @csrf
                
                <div class="col-lg-3">
                <img  src= {{ asset('img\avatarProf\avatar-padrão.png') }} alt="avatar">
                <input id="avatar"  type="hidden" name="avatar" value='img\avatarProf\avatar-padrão.png' >  
                 <h2 class="fw-normal">Avatar</h2>
                    <p></p>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Selecione um Avatar
                        </a>
                            
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @foreach($avatares as $avatar)
                        <div class="col-lg-3">
                        <img  src= {{ asset( $avatar->path) }} alt="avatar">   
                        <input id="avatar" type="checkbox"  name="avatar" value={{ $avatar->path }} >
                        </div>
                        @endforeach
                        </div>
                    </li>
                    </div>
                <div class="row mb-3">
                     <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Ocupação') }}</label>
                        <div class="col-md-6">
                        <input id="profissao" type="text" class="form-control @error('profissao') is-invalid @enderror" name="profissao" value="{{ $prof }}" required autocomplete="profissao" autofocus>
                       <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="CPF" class="col-md-4 col-form-label text-md-end">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="CPF" type="text" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" class="form-control @error('CPF') is-invalid @enderror" name="CPF" value="{{ old('CPF') }}" required autocomplete="CPF">

                                @error('CPF')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                            crossorigin="anonymous"></script>
                        <script type="text/javascript" src={{ asset("js/endereco.js") }}></script>
                        <div class="row mb-3">
                            <label for="CEP" class="col-md-4 col-form-label text-md-end">{{ __('CEP') }}</label>

                            <div class="col-md-6">
                            <input name="cep" type="text" id="cep" value="" size="10" class="form-control @error('CEP') is-invalid @enderror" value="{{ old('CEP') }}" required autocomplete="CEP" />
                                @error('CEP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rua" class="col-md-4 col-form-label text-md-end">{{ __('Rua') }}</label>

                            <div class="col-md-6">
                                <input id="rua" type="text" class="form-control @error('RUA') is-invalid @enderror" name="rua" value="{{ old('RUA') }}" required autocomplete="rua">

                                @error('RUA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="bairro" class="col-md-4 col-form-label text-md-end">{{ __('Bairro') }}</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text"  class="form-control @error('Bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro">

                                @error('BAIRRO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cidade" class="col-md-4 col-form-label text-md-end">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text"  class="form-control @error('CIDADE') is-invalid @enderror" name="cidade" value="{{ old('CIDADE') }}" required autocomplete="cidade">

                                @error('CIDADE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <input id="estado" type="text"  class="form-control @error('Estado') is-invalid @enderror" name="estado" value="{{ old('ESTADO') }}" required autocomplete="estado">

                                @error('ESTADO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('senha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                            <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<script src={{ asset('js/avatar.js') }}></script>
</body>
</html>