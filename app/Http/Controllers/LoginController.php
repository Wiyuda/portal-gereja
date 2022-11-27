<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
      if(Auth::check()) {
        return redirect()->route('dashboard');
      }

        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
      $validate= $request->validate([
        'username' => 'required',
        'password' => 'required',
      ]);
      $credentials=request(['username','password']);
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
 
        return redirect()->route('dashboard');
      } 
        return back()->withErrors([
          'error' => 'Username atau password tidak sesuai',
      ]);
      
    }
}
