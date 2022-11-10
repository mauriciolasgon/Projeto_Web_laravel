<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    public function login(){


        // $cliente = new Cliente;
        // $cliente->name = "Jean Carlos";
        // $cliente->email = "jeancarloscharao@gmail.com";
        // $cliente->password = Hash::make("12345678");
        // $cliente->save();
        $aux=0;

        return view('/auth/login',['aux'=>$aux]);



    }

    public function logar(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('professor')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');

    }


    public function dashboard(){

        return view('home');
    }

    public function logout(Request $request)
    {
        Auth::guard('professores')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }
    //
}
