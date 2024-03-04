<?php

namespace App\Repositories\Db;

use App\Contracts\Repository\QuestionRepository as Contract;
use App\Models\Question;
use Illuminate\Support\Collection;

class QuestionRepository extends BaseRepository implements Contract
{
    public function model(): string
    {
        return Question::class;
    }

    public function getRandomQuestionIdForGame(int $take): Collection
    {
        return $this->model->query()->select('id')->inRandomOrder()->take(5)->get()->pluck('id');
    }

    public function getNextQuestionsInGame(string $gameId, string $playerId, array $with = [])
    {
        return $this->model->with($with)
            ->whereDoesntHave('games', function ($query) use ($gameId, $playerId) {
                $query
                    ->where('player_id', $playerId)
                    ->where('game_id', $gameId)
                    ->whereNotNull('game_questions.point');
            })->first();
    }
}
