<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     * This function is used to show the admin dashboard
     */
    public function index()
    {
        return view('admin.dashboard', ['locale' => app()->getLocale()]);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     * This function is used to logout the admin
     */
    public function logout(Request $request)
    {
        //if the admin is logged in then logout the admin
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Redirige al administrador después del inicio de sesión exitoso.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectTo(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect(url(app()->getLocale().'/dashboard'));
        }
        return redirect(url(app()->getLocale().'/login'));    }


    /**
     * AdminController constructor.
     * This function is used to restrict the admin to access the admin dashboard without login
     */
    public function __construct()
    {
        //if the admin is not logged in then redirect the admin to the admin login page
        $this->middleware('auth:admin');
    }
}
