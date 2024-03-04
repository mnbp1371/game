<?php

namespace App\Http\Controllers\Player;

use App\Contracts\Repository\GameQuestionRepository;
use App\Contracts\Repository\GameRepository;
use App\Contracts\Repository\OptionRepository;
use App\Contracts\Repository\QuestionRepository;
use App\Enums\GameStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Player\AskRequest;
use Illuminate\Http\RedirectResponse;

class PlayController extends Controller
{
    public function __construct(
        private readonly GameRepository $gameRepository,
        private readonly QuestionRepository $questionRepository,
        private readonly GameQuestionRepository $gameQuestionRepository,
        private readonly OptionRepository $optionRepository,
    )
    {
    }

    public function play(string $gameId)
    {
        $game = $this->gameRepository->find($gameId);
        if ($game->status !== 'IN_PROGRESS') {
            return redirect()->route('player.dashboard')->with('error', "game status is {$game->status}");
        }

        $question = $this->questionRepository->getNextQuestionsInGame(
            gameId: $gameId,
            playerId: auth('player')->user()->id,
            with: ['options'],
        );

        if (empty($question)) {
            $this->gameRepository->update(
                data: [
                    'status' => GameStatus::COMPLETED,
                ],
                id: $gameId,
            );

            return redirect()->route('player.dashboard');
        }

        return view('player.game.play')->with([
            'question' => $question,
            'game' => $game,
        ]);
    }

    public function answer(string $gameId, AskRequest $request): RedirectResponse
    {
        $messageType = 'error';
        $message = 'Your answer is wrong';

        $questionId = $request->get('question_id');

        $correctCount = $this->optionRepository->correctCount(
            questionId: $questionId,
        );

        $isCorrect = $this->optionRepository->isCorrect(
            questionId: $questionId,
            optionId: $request->input('option_id')
        );

        $point = 0;
        if (!empty($isCorrect)) {
            $messageType = 'success';
            $message = 'Your answer is correct';

            $point = $this->questionRepository->find($questionId)->point;
            $point = $point / $correctCount;
        }

        $this->gameQuestionRepository->update(
            questionId: $questionId,
            gameId: $gameId,
            data: [
                'point' => $point,
            ]
        );

        return redirect()->route('player.games.play', [
            'game' => $gameId,
        ])->with($messageType, $message);
    }
}
