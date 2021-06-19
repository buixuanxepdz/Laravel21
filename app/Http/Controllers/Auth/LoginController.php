<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request){
        // $email = $request->get('email');
        // $password = $request->get('password');
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            if(Auth::user()->role == 1 || Auth::user()->role == 2){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect()->intended('/');
            }
                
        }else{
            return back()->withErrors([
                'email' => 'Sai email hoặc mật khẩu'
            ]);
        }
    }
}