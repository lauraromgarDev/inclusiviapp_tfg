<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */


    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        //si es un administrador que tampoco se cierre la sesion
        if ($request->is('administrator/*') || $request->is('administrator')) {
            return route('admin.login');
        }

        //si es un administrador que tampoco se cierre la sesion
        if ($request->is('admin/*') || $request->is('admin')) {
            return route('admin.login');
        }

        //si es un administrador autenticado
        if (Auth::guard('admin')->check()) {
            return route('admin.dashboard', ['locale' => app()->getLocale()]);
        }

        //si es un usuario normal autenticado
        if (Auth::guard('web')->check()) {
            return route('main.index', ['locale' => app()->getLocale()]);
        }

        // si no se encuentra ningún usuario autenticado, regresar a la ruta de inicio de sesión
        return route('login');
    }

}
