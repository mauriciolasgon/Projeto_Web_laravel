@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
            
                <form method="POST" action="{{ route('cria.users') }}">
                @csrf

                <div class="col-lg-4">
                <img  src= {{ asset('img\avatarProf\avatar-padrão.png') }} alt="avatar">   
                 <h2 class="fw-normal">Imagem</h2>
                    <p></p>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Selecione um imagem para o curso
                        </a>
                            
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <div class="col-lg-4">
                        <img   alt="avatar">   
                        <input id="avatar" type="checkbox"  name="avatar" value= >
                        </div>
                        </div>
                    </li>
                    </div>
                    <div class="row mb-3">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

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
                            <label for="ds" class="col-md-4 col-form-label text-md-end">{{ __('Descrição simplificada') }}</label>

                            <div class="col-md-6">
                                <input id="ds" type="text" class="form-control @error('ds') is-invalid @enderror" name="ds" value="{{ old('ds') }}" required autocomplete="Descriçao">

                                @error('ds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="dc" class="col-md-4 col-form-label text-md-end">{{ __('Descrição completa') }}</label>

                            <div class="col-md-6">
                                <input id="dc" type="text"  class="form-control @error('dc') is-invalid @enderror" name="dc" value="{{ old('dc') }}" required autocomplete="dc">

                                @error('dc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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