<?php

namespace App\Repositories\Db;

use App\Contracts\Repository\GameQuestionRepository as Contract;
use App\Models\GameQuestion;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GameQuestionRepository implements Contract
{
    public function model(): string
    {
        return GameQuestion::class;
    }

    public function analytics(): Collection
    {
        return DB::table('game_questions')
            ->selectRaw('SUM(game_questions.point) AS point, players.name, players.id')
            ->join('games', 'game_questions.game_id', 'games.id')
            ->join('players', 'players.id', 'games.player_id')
            ->groupBy('games.player_id')
            ->take(10)
            ->get();
    }

    public function update(string $questionId, string $gameId, array $data): int
    {
        return GameQuestion::query()
            ->where('question_id', $questionId)
            ->where('game_id', $gameId)
            ->update($data);
    }

}
