<?php

namespace App\Http\Controllers\Player;

use App\Contracts\Repository\GameRepository;
use App\Contracts\Repository\QuestionRepository;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Question;

class GameController extends Controller
{
    public function __construct(
        private readonly GameRepository     $gameRepository,
        private readonly QuestionRepository $questionRepository,
    )
    {
    }

    public function store()
    {
        $player = auth('player')->user();

        if (
            $this->gameRepository->checkGameWithSpecialStatus('IN_PROGRESS', $player->id)
        ) {

            return redirect()->back()->with('error', 'you have a IN_PROGRESS game');
        }

        $questions = $this->questionRepository->getRandomQuestionIdForGame(5);
        $game = $this->gameRepository->create([
            'title' => 'game',
            'player_id' => $player->id,
            'status' => 'IN_PROGRESS',
        ]);

        $this->gameRepository->addQuestions(
            id: $game->id,
            questions: $questions,
        );

        return redirect()->back();
    }
}
