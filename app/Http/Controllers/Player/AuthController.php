<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pleyer\LoginRequest;
use App\Http\Requests\Pleyer\RegisterRequest;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function registerForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('player.auth.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $player = Player::create($request->toArray());
        auth('player')->login($player);

        return redirect()->route('player.dashboard');
    }

    public function loginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('player.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $user = auth('player')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ], true);

        if (empty($user)) {
            return redirect()->back()->with('error', 'something is wrong');
        }

        return redirect()->route('player.dashboard');
    }

    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('player.auth.dashboard')
            ->with([
                'games' => Game::query()->paginate(),
            ]);
    }

    public function logout(): RedirectResponse
    {
        auth('player')->logout();

        return redirect()->route('player.login-form');
    }
}
