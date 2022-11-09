<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',[LoginController::class,'showProfLoginForm'])->name('prof.login-view');
Route::post('/admin',[LoginController::class,'ProfLogin'])->name('prof.login');

#Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
#Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/teste', [App\Http\Controllers\HomeController::class, 'index'])->name('teste');
Route::get('/admin/dashboard',function(){
    return view('home');
})->middleware('auth:professor');
