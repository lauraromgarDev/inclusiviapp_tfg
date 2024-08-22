<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    protected function authenticated(Request $request, $user)
    {

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard', ['locale' => app()->getLocale()]);
        } elseif (Auth::guard('web')->check()) {
            return redirect()->route('main.index', ['locale' => app()->getLocale()]);
        } else {
            return redirect()->route('login', ['locale' => app()->getLocale()]);
        }
    }




    protected function redirectTo()
    {
        if (app()->runningUnitTests()) {
            return '/temporarily-disable-redirect';
        }

        $locale = app()->getLocale();

        if (Auth::guard('admin')->check()) {
            return route('admin.dashboard', ['locale' => $locale]);

        } elseif (Auth::guard('web')->check()) {
            return route('main.index', ['locale' => $locale]);

        } else {
            return route('login', ['locale' => $locale]);
        }
    }



    protected function attemptLogin(Request $request)
    {
        // Busca al administrador
        $admin = Administrator::where('email', $request->email)->first();

        // Si existe un administrador con ese correo y su contraseña es correcta
        if ($admin && password_verify($request->password, $admin->password)) {
            // Iniciar sesión con el guard 'administrators'
            Auth::guard('admin')->login($admin, $request->filled('remember'));

            // Redireccionar al panel de administración
            return redirect(url(app()->getLocale().'/dashboard'));
        }

        // Si no, verificar si el usuario es un usuario normal
        $credentials = $this->credentials($request);

        // Verificar si las credenciales son válidas
        if ($this->guard()->attempt($credentials, $request->filled('remember'))) {
            return true;
        }

        // Si no se pudo autenticar ni como administrador ni como usuario, regresar false
        return false;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()
            ->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }





}


