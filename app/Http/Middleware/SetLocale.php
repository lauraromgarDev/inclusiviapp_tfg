<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (!in_array($locale, ['en', 'es'])) {
            $segments = $request->segments();
            $segments[0] = config('app.fallback_locale');
            $url = implode('/', $segments);

            if ($url !== $request->url()) { // Comprueba si la URL ya ha cambiado
                return redirect()->to($url);
            }
        }

        App::setLocale($locale);
        return $next($request);
    }







}
