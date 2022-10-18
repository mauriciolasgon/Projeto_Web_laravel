<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');

    }
    
    public function auth(Request $request)
    {
        if(Auth::attempt(['RAP'=>$request->RAP,'password'=>$request->password])) {
            return redirect('/a');
        }else{
            return redirect()->back();
        }

    }
    //
}
