<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
   public function login()
   {
       if (Auth::user()) {
           return redirect()->route('home');
       }
       return view('auth.login');
   }
   public function register()
   {
       return view('auth.register');
   }
   

   public function logout()
   {
       Auth::logout();
       return redirect()->route('auth.login');
   }
   public function access(Request $request)
   {
    $request->merge([$request->user=>strtolower($request->user)]);
    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        if (Auth::user()->hasRole('admin|owner|employee')) {
            return redirect()->route('home');
        }
        return redirect()->route('invoices.pendings');
    }
    return back()->withErrors([
        'error' => 'Los datos suministrados no son válidos.',
    ]);
   }
}
