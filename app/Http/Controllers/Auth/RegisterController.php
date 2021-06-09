<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm(){
        return view('backend.auth.register');
    }
    
    public function register(Request $request)
    {   
        $check = User::where('email', $request->get('email'))->get();
        if(count($check) == 1)
        {
            return back()->withErrors([
                'email' => 'Emai dã tồn tại'
            ]);
        }
        else{
             $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
            ]);
        }
       
        
       
            $email = $request->get('email');
            $user_id = User::where('email',$email)->first();
            UserInfo::create([
                'user_id' => $user_id->id,
                'phone' => $request->get('phone'),
                'address' => $request->get('address')
            ]);        
        
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($data))
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
    }
}
