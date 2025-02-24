<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->create) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            User::create([
                'name' => htmlspecialchars($request->name),
                'phone' => htmlspecialchars($request->phone),
                'email' => htmlspecialchars($request->email),
                'password' => Hash::make($request->password),
            ]);

            return redirect('/register')->with('success', 'Account created successfully!');
        }

        return redirect('/register')->with('error', 'Failed to register.');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => null,
                ]);
            }
            Auth::login($user);
            return redirect('/dashboard')->with('success', 'Logged in successfully!');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Google login failed.');
        }
    }
}
