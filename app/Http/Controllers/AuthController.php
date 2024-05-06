<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create(){
        return inertia('Auth/login');
    }

    public function store(Request $request){
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password'=> 'required|string|'
        ]), 
        true))//true sets remembered to always
        {
            throw ValidationException::withMessages([
                'email' => 'Authentication failed'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended();
    }

    public function destroy(){}
}
