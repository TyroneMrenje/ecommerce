<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    
    public function userRegister(Request $request){

        $credentials = $request ->validate([
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required','email', 'unique:users,email'],
            'password'=>['required','string',
            Password::min(8)
            ->mixedCase()
            ->numbers()
            ->symbols()
            ->uncompromised()],
            'password_confirmation'=>'required|same:password'

        ]);

        $user = User::create([
            'name'=>$credentials['name'],
            'email'=>$credentials['email'],
            'password'=>Hash::make($credentials['password'])
            
        ]);

        Auth::login($user);   
        
        return redirect('/')->with('success', 'Welcome to Amimo Spices');
        
    }
}
