<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request){

       
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('/');
            }
     
            return back()->withErrors([
                'email' => 'Password invalide.',
            ])->onlyInput('email');
        }




    }
    
   
 