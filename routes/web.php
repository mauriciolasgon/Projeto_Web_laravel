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

// Rotas da pagina do curso
Route::get('/curso/{id}/{aux}',[CursoController::class,'index'])->name('curso');
Route::get('/medias/{id}/{aux}',[CursoController::class,'index']);
Route::post('/atribui/medias/{alunos}/{cursoid}',[CursoController::class,'alteraMedias'])->name('atribui.medias');

// View dos alunos do curso
Route::get('/integrantes/{userId}',[CursoController::class,'showIntegrantesView']);

# Inscrever alunos no curso
Route::get('/add/aluno/{user}',[CursoController::class,'AddAlunos'])->name('add.aluno');

# Redefinir senha
Route::get('/redefinir/blade',[App\Http\Controllers\HomeController::class,'redefinirBlade']);
Route::post('/show/redefinir',[App\Http\Controllers\HomeController::class,'redefinirBlade'])->name('show.reset');
Route::post('/redefinir/senha',[App\Http\Controllers\HomeController::class,'redefinirSenha'])->name('redefinir.senha');

# Remover alunos do curso
Route::get('/remove/aluno/{cursoId}',[CursoController::class,'removeAlunos'])->name('remove.aluno');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
