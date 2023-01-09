<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*utworzony kontroler do logowania*/
class LoginController extends Controller
{

    public function authenticate(Request $request)
    {   //przekazywane dane oraz ich funkcjonalności/
        $credentials = $request->validate([
        //walidacje -wymagania pól
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        //Jeżeli poprawne logowanie sprzekieruj na stronę główną/
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'Niepoprawny login lub hasło',
        ])->onlyInput('email');
    }


    public function showLoginForm()
    {
        return view ("user.login");
    }


    //wylogowanie/
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
