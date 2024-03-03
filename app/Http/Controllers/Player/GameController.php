<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Question;

class GameController extends Controller
{
    public function store()
    {
        $player = auth('player')->user();

        if (
            Game::query()
                ->where('player_id', $player->id)
                ->where('status', 'IN_PROGRESS')
                ->exists()
        ) {

            return redirect()->back();
        }

        $questions = Question::query()->select('id')->inRandomOrder()->take(5)->get()->pluck('id');
        $game = Game::query()->create([
            'title' => 'game',
            'player_id' => $player->id,
            'status' => 'IN_PROGRESS',
        ]);

        $game->questions()->sync($questions);

        return redirect()->back();
    }
}
