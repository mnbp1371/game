<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pleyer\LoginRequest;
use App\Http\Requests\Pleyer\RegisterRequest;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('player.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = Player::create($request->toArray());
        Auth::guard('player')->login($user);

        return redirect()->route('player.dashboard');
    }

    public function loginForm()
    {
        return view('player.login');
    }

    public function login(LoginRequest $request)
    {
        Auth::guard('player')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ], true);

        return redirect()->route('player.dashboard');
    }

    public function dashboard()
    {
        return view('player.dashboard');
    }

    public function logout()
    {
        Auth::guard('player')->logout();

        return redirect()->route('player.login-form');
    }
}
