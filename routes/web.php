<?php

use App\Http\Controllers\Admin as Admin;
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
Route::group([
    'middleware' => 'player',
    'as' => 'player.',
    'prefix' => 'player',
], function () {
    Route::get('login', [Player\AuthController::class, 'loginForm'])
        ->withoutMiddleware('player')
        ->middleware('guest:player')
        ->name('login-form');

    Route::post('login', [Player\AuthController::class, 'login'])
        ->withoutMiddleware('player')
        ->name('login');

    Route::get('register', [Player\AuthController::class, 'registerForm'])
        ->withoutMiddleware('player')
        ->middleware('guest:player')
        ->name('register-form');

    Route::post('register', [Player\AuthController::class, 'register'])
        ->withoutMiddleware('player')
        ->name('register');

    Route::get('dashboard', [Player\AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('logout', [Player\AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('games', Player\GameController::class)->only('show', 'store');
    Route::get('games/{game}/play', [Player\PlayController::class, 'play'])->name('games.play');
    Route::post('games/{game}/play', [Player\PlayController::class, 'answer'])->name('games.answer');
});

Route::group([
    'middleware' => 'admin',
    'as' => 'admin.',
    'prefix' => 'admin',
], function () {
    Route::get('login', [Admin\AuthController::class, 'loginForm'])
        ->withoutMiddleware('admin')
        ->middleware('guest:admin')
        ->name('login-form');

    Route::post('login', [Admin\AuthController::class, 'login'])
        ->withoutMiddleware('admin')
        ->middleware('guest:admin')
        ->name('login');

    Route::get('dashboard', [Admin\AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('logout', [Admin\AuthController::class, 'logout'])
        ->name('logout');

    Route::get('analytics', Admin\AnalyticsController::class)
        ->name('analytics');

    Route::resource('questions', Admin\QuestionController::class);
    Route::resource('options', Admin\OptionController::class)
        ->only('destroy', 'update', 'store');
});
