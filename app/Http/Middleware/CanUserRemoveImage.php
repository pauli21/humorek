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
        //sprawdzamy czy to moderator i czy zdjęcie należy do niego
        if ($request->user()->isModerator() && $request->user()->id==$image->user_id)
        {
            return $next($request);
  
        }
        //sprawdzenie czy to admin
        if ($request->user()->isAdmin())
        {
            return $next($request);
  
        }

        return back()->withErrors([
        'error' => 'Youg don\'t have an access',
        ]);
    }
}
