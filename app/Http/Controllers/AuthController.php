<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller {
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $existing = User::where('email', $googleUser->getEmail())->first();

        // Bloquear si intenta entrar un admin vía Google
        if ($existing && $existing->role !== User::ROLE_CONVIDAT) {
            return redirect('/login')->with('error', 'Només els convidats usen Google.');
        }

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?? 'Convidat',
                'role' => User::ROLE_CONVIDAT,
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => null, // No necesita password
            ]
        );

        Auth::login($user);
        return redirect('/dashboard');
    }
}
