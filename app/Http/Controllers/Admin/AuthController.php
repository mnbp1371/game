<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function loginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        auth('admin')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ], true);

        return redirect()->route('admin.auth.dashboard');
    }

    public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.auth.dashboard');
    }

    public function logout(): RedirectResponse
    {
        auth('admin')->logout();

        return redirect()->route('admin.auth.form');
    }
}
