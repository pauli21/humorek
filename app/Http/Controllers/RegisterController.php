<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required','min:3', 'max:15', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);

        $user = User::create($credentials);

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");

    }


    

    public function showRegisterForm()
    {
        return view ("user.register");
    }


}
