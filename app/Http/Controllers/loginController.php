<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Services\CartService;

class loginController extends Controller
{
    //
    public function authenticate(Request $request):RedirectResponse{

       $credentials= $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
       ]);

       if(Auth::attempt($credentials)){

            $request->session()->regenerate();

            app(CartService::class)->mergeGuestCart($request->session()->getId());


            return redirect()->intended('/')->with('success', 'Welcome back to Amimo Spices');

       }

         return back()->withErrors([
                'email'=>'The provided credentials do not match our records.'
         ])->onlyInput('email');

    }
}
