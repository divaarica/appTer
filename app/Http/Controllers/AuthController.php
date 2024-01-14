<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('Auth.login');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }

    public function login(LoginRequest $request){
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            
            $user = Auth::user();
            $role = $user->role_id;
            
            //session->regenerate;
            $request->session()->regenerate();

            if ($role === 1) {
                return redirect()->route('admins.index');
            } else {
                return redirect()->intended(route('users.index'));
            }
        };

        return redirect()->route('auth.login')->withErrors(['error'=>'email ou mot de passe incorrecte'])->onlyInput('email');
    }
}
