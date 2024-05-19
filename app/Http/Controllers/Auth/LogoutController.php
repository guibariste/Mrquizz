<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        if (auth()->check()) {
        Auth::logout();
      
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        }
        return redirect('/');
    }
}
// return redirect('/');