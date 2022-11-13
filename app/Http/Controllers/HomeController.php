<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Curso;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {      
        $cursos=Curso::all();
        $cursos=json_decode($cursos);
        $user=json_decode($user);
        $name=$user->name;
        
        return view('home',['name'=>$name,'user'=>$user,'cursos'=>$cursos]);
    }
}
