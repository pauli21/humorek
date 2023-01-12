<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanUserVote
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
        //jeżeli oddano głos zostanie inforacja że już oddano głos
        $image_id=$request->get('image');
        if ($request->user()->hasVoted($image_id))
        {
	         return back()->withErrors([
            'error' => 'You have already voted',
            ]);
        }

        return $next($request);

    }
}
