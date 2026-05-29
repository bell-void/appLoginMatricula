<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Cambiado a /dashboard para ser consistente con tu proyecto
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'email';
    }

    // Redirigir a Google
    public function redirectToGoogle()
    {
        // Forzamos el selector de cuentas de Google
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    // Callback de Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'No se pudo iniciar sesión con Google.');
        }

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt('google') // Contraseña por defecto para usuarios Google
            ]);
        }

        Auth::login($user);

        // Redirigimos al Dashboard
        return redirect('/dashboard');
    }

    public function authenticated(Request $request, $user)
    {
        $device = $request->header('User-Agent');
        $user->update([
            'device' => $device
        ]);
    }
}