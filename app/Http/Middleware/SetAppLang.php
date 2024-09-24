<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetAppLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // url = domain/en/post .. Check what is the 2nd segment word, to update app language with it
        if (! in_array($request->segment(2),     config('app.available_locales'))) {
            abort(400);
        }

        App::setLocale($request->segment(2));
        return $next($request);
    }
}
