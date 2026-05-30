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

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'handleGoogleCallback', 'handleGithubCallback']);
    }

    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN
    |--------------------------------------------------------------------------
    */

    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'No se pudo iniciar sesión con Google.');
        }

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name'     => $googleUser->name,
                'email'    => $googleUser->email,
                'password' => bcrypt('google_' . uniqid()),
            ]);
        }

        Auth::login($user, true);

        return redirect('/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | GITHUB LOGIN
    |--------------------------------------------------------------------------
    */

    public function redirectToGithub()
    {
        return Socialite::driver('github')
            ->scopes(['user:email'])
            ->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'No se pudo iniciar sesión con GitHub.');
        }

        $user = User::where('email', $githubUser->email)->first();

        if (!$user) {
            $user = User::create([
                'name'     => $githubUser->name ?? $githubUser->nickname,
                'email'    => $githubUser->email,
                'password' => bcrypt('github_' . uniqid()),
            ]);
        }

        Auth::login($user, true);

        return redirect('/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | DEVICE TRACKING
    |--------------------------------------------------------------------------
    */

    public function authenticated(Request $request, $user)
    {
        $device = $request->header('User-Agent');
        $user->update(['device' => $device]);
    }
}