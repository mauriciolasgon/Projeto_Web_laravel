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

// Rotas de registro
Route::get('/registro/{aux}',[UsuarioController::class,'verifica'])->name('registro');
Route::post('/verifica/{aux}',[UsuarioController::class,'verifica'])->name('verifica');
Route::get('/cria/user/{aux}',[UsuarioController::class,'verifica']);
Route::post('/cria/users',[HomeController::class,'criaUser'])->name('cria.users');

// Rotas da pagina do curso
Route::get('/curso/{id}/{aux}',[CursoController::class,'index'])->name('curso');
Route::get('/medias/{id}/{aux}',[CursoController::class,'index']);
Route::post('/atribui/medias/{alunos}/{cursoid}',[CursoController::class,'alteraMedias'])->name('atribui.medias');

//view cursos do usuario
Route::get('/view/cursos/{matriculas}/{medias}',[HomeController::class,'showUserCursos']);

// View todos users
Route::get('/users',[HomeController::class,'showIntegrantesView']);

//encerra matricula
Route::get('/encerra/matricula/{cursoid}/{indicador}',[CursoController::class,'encerraMateria']);

# Inscrever alunos no curso
Route::get('/add/aluno/{cursoid}/{user}/{aux}',[CursoController::class,'AddAlunos'])->name('add.aluno');

# Redefinir senha
Route::get('/redefinir/blade',[App\Http\Controllers\HomeController::class,'redefinirBlade']);
Route::post('/show/redefinir',[App\Http\Controllers\HomeController::class,'redefinirBlade'])->name('show.reset');
Route::post('/redefinir/senha',[App\Http\Controllers\HomeController::class,'redefinirSenha'])->name('redefinir.senha');

# Remover alunos do curso
Route::get('/remove/aluno/{cursoId}/{user}/{aux}',[CursoController::class,'removeAlunos'])->name('remove.aluno');

# Register curso
Route::get('/register/curso',[HomeController::class,'showRegisterCursoView']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
