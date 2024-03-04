<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Repository\GameQuestionRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AnalyticsController extends Controller
{
    public function __construct(
        private readonly GameQuestionRepository $gameQuestionRepository,
    )
    {
    }

    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $analytics = $this->gameQuestionRepository->analytics();

        return view('admin.analytics')
            ->with([
                'analytics' => $analytics,
            ]);
    }
}
