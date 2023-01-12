<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Image;

class CanUserRemoveImage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //znalezienie zdjęcia w bazie danych
        $image_id=$request->get('image');
        $image=Image::find($image_id);
        //jeżeli użytkownik nie oddał głosu na to zdjęcie to ma taką możliwość po wciśnięciu łapki
        if ($request->user()->id==$image->user_id)
        {
            return $next($request);
  
        }
        //zakładamy że użtkownik id=1 jest adminem, pozostali to użytkownicy
        if ($request->user()->id==1)
        {
            return $next($request);
  
        }

        return back()->withErrors([
        'error' => 'You don\'t have an access',
        ]);
    }
}
