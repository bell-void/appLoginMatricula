<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')
            ->with(['allow_signup' => 'true'])
            ->redirect();
    }

    public function callback()
    {
        try {
            $githubUser = Socialite::driver('github')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'No se pudo iniciar sesión con GitHub.');
        }

        $user = User::where('email', $githubUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name'     => $githubUser->getName() ?? $githubUser->getNickname(),
                'email'    => $githubUser->getEmail(),
                'password' => bcrypt('github_' . uniqid()),
            ]);
        }

        Auth::login($user, true);

        return redirect('/dashboard');
    }
}