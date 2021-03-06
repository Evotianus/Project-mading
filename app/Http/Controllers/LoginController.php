<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login.login');
    }
    public function Authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/mainpage');
            // return $credentials;
        }
        // alert("Login Error");
        // return back()->with('LoginError', 'Login Failed!');
        return redirect('/login');
        
    }
}
