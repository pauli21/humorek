<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckEmailExistence
{
    public function handle(Request $request, Closure $next)
    {
        $email = $request->input('email');

        // Walidacja formatu e-maila
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Nieprawidłowy format adresu email.'], 400);
        }

        // Sprawdź, czy istnieje domena e-maila (za pomocą wcześniej omówionego kodu)
        list(, $domain) = explode('@', $email);
        if (!$this->isDomainValid($domain)) {
            return response()->json(['error' => 'Domena e-maila jest nieprawidłowa lub nie posiada rekordów DNS.'], 400);
        }

        // Wykonaj kolejne środki w przypadku poprawności
        return $next($request);
    }

    private function isDomainValid($domain)
    {
        return checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A');
    }
}
