<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Http\Requests\Player\AskRequest;
use App\Models\Game;
use App\Models\GameQuestion;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayController extends Controller
{
    public function play(string $gameId)
    {
        $game = Game::query()->findOrFail($gameId);
        if ($game->status !== 'IN_PROGRESS') {
            return redirect()->route('player.dashboard')->with('error', "game status is {$game->status}");
        }

        $question = Question::with(['options'])
            ->whereDoesntHave('games', function ($query) use ($gameId) {
                $query
                    ->where('player_id', auth('player')->user()->id)
                    ->where('game_id', $gameId)
                    ->whereNotNull('game_questions.point');
            })->first();


        if (empty($question)) {
            Game::query()
                ->where('id', $gameId)
                ->update([
                    'status' => 'COMPLETED',
                ]);

            return redirect()->route('player.dashboard');
        }

        return view('player.game.play')->with([
            'question' => $question,
            'game' => $game,
        ]);
    }

    public function answer(string $gameId, AskRequest $request): \Illuminate\Http\RedirectResponse
    {
        $messageType = 'error';
        $message = 'Your answer is wrong';

        $questionId = $request->get('question_id');

        $correctCount = Option::query()
            ->where('question_id', $questionId)
            ->where('is_correct', true)
            ->count();

        $isCorrect = Option::query()
            ->where('question_id', $questionId)
            ->where('id', $request->input('option_id'))
            ->where('is_correct', true)
            ->exists();

        $point = 0;
        if (!empty($isCorrect)) {
            $messageType = 'success';
            $message = 'Your answer is correct';

            $point = Question::query()->findOrFail($questionId)->point;
            $point = $point / $correctCount;
        }

        GameQuestion::query()
            ->where('question_id', $questionId)
            ->where('game_id', $gameId)
            ->update([
                'point' => $point,
            ]);

        return redirect()->route('player.games.play', [
            'game' => $gameId,
        ])->with($messageType, $message);
    }
}
