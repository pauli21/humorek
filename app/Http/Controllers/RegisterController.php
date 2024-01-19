<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function register(Request $request)
    {   //walidacje pól -> wymagania
        $credentials = $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required','min:3', 'max:15', 'unique:users'],
            'password' => ['required', 'min:8', 'regex:/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);
        //tworzenie usera z wymaganiami
        $user = User::create($credentials);
        //zalogowanie użytkownika po rejestracji
        auth()->login($user);
        //jeżeli sukces przekieruj na stronę główną
        return redirect('/')->with('success', "Account successfully registered.");

    }


    public function showRegisterForm()
    {
        return view ("user.register");
    }
}
