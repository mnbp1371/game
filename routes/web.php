<?php

use App\Http\Controllers\Player as Player;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'middleware' => 'player',
    'as' => 'player.',
    'prefix' => 'player',
], function () {
    Route::get('login', [Player\AuthController::class, 'loginForm'])
        ->withoutMiddleware('player')
        ->name('login-form');

    Route::post('login', [Player\AuthController::class, 'login'])
        ->withoutMiddleware('player')
        ->name('login');

    Route::get('register', [Player\AuthController::class, 'registerForm'])
        ->withoutMiddleware('player')
        ->name('register-form');

    Route::post('register', [Player\AuthController::class, 'register'])
        ->withoutMiddleware('player')
        ->name('register');

    Route::get('dashboard', [Player\AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('logout', [Player\AuthController::class, 'logout'])
        ->name('logout');
});
