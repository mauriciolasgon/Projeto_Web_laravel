<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CursoController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UsuarioController::class,'welcome']);
Route::get('/a',[UsuarioController::class,'index'])->name('welcome');
Route::get('/Materias/{materia}', [UsuarioController::class, 'show'])->name('materia');
Route::get('/Alunos/{aluno}', [UsuarioController::class, 'show_aluno'])->name('aluno');

Route::get('/registro',[UsuarioController::class,'verifica'])->name('registro');
Route::post('/verifica',[UsuarioController::class,'verifica'])->name('verifica');


# Autenticação da tabela professors
Route::get('/professores/login', [ProfessorController::class, 'login'])->name('professores.login');
Route::post('/professores/logar', [ProfessorController::class, 'logar'])->name('professores.logar');
Route::post('/professores/logout', [ProfessorController::class, 'logout'])->name('professores.logout');
Route::get('/professores/dashboard/{user}', [ProfessorController::class, 'dashboard'])->name('professores.dashboard')->middleware('auth.professores');

# Cadastro na tabela professors
Route::post('/prof/register', [App\Http\Controllers\Auth\RegisterController::class,'profregister'])->name('prof.register');

# Rota para a página do curso
Route::get('/curso/{curso}/{identificador}/{name}',[CursoController::class,'index'])->name('curso');

# Inscrever alunos no curso
Route::get('/add/aluno/{nome}/{curso}',[CursoController::class,'AddAlunos'])->name('add.aluno');
Auth::routes();
Route::get('/home/{user}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


