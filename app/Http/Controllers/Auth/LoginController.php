<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function validateUserAndRedirect(Request $request)
    {
        // Validar las credenciales del usuario
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // El usuario existe en la base de datos, redirigirlo a la vista de inicio
            return redirect($this->redirectTo);
        }

        // Si las credenciales no son válidas, redirigirlo de nuevo al formulario de inicio de sesión
        return redirect('/')->withErrors(['auth.failed' => 'Credenciales incorrectas']);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
    public function login()
    {
        return view('auth.login');
    }
}
