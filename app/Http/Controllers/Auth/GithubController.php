<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GithubController extends Controller
{
    // 1. Redirigir a GitHub
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    // 2. Callback de GitHub
    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        // Buscar usuario por email
        $user = User::where('email', $githubUser->getEmail())->first();

        // Si no existe, lo crea
        if (!$user) {
            $user = User::create([
                'name' => $githubUser->getName() ?? $githubUser->getNickname(),
                'email' => $githubUser->getEmail(),
                'password' => bcrypt('github') // password dummy
            ]);
        }

        // Login automático
        Auth::login($user);

        return redirect('/dashboard');
    }
}
