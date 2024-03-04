<?php

namespace App\Providers;

use App\Contracts\Repository as Contracts;
use App\Repositories\Db as Repository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Contracts\GameQuestionRepository::class, Repository\GameQuestionRepository::class);
        $this->app->bind(Contracts\GameRepository::class, Repository\GameRepository::class);
        $this->app->bind(Contracts\QuestionRepository::class, Repository\QuestionRepository::class);
        $this->app->bind(Contracts\OptionRepository::class, Repository\OptionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
