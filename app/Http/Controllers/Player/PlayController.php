<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayController extends Controller
{
    public function play(string $id)
    {
        $question = DB::table('game_questions')
            ->join('games', 'games.id', 'game_questions.game_id')
            ->join('questions', 'questions.id', 'game_questions.question_id')
            ->whereNull('game_questions.point')
            ->where('games.id', $id)
            ->where('games.player_id', auth('player')->user()->id)
            ->first();

        if (empty($question)) {
            Game::query()->where('id', $id)
            ->update([
               'status' => 'COMPLETED'
            ]);

            return redirect()->route('player.dashboard');
        }

        return view('player.game.play')->with([
            'question' => $question,
            'gameId' => $question->game_id,
            'options' => Option::query()->where('question_id', $question->id)->get(),
        ]);
    }

    public function playPost(string $questionId, Request $request)
    {
        $answerTrue = Option::query()
            ->where('question_id', $questionId)
            ->where('id', $request->get('answer'))
            ->where('is_correct', true)
            ->exists();

        DB::table('game_questions')
            ->where('question_id', $questionId)
            ->update([
                'point' => $answerTrue ? Question::query()->findOrFail($questionId)->point : 0
            ]);

        return redirect()->route('player.games.play', ['id' => $request->get('game_id')]);
    }
}
