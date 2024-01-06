<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login',[
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('no_badge', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/cpanel');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function logout(){
    flush();
    }
}
