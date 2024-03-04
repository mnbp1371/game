<?php

namespace App\Repositories\Db;

use App\Contracts\Repository\GameRepository as Contract;
use App\Models\Game;
use Illuminate\Support\Collection;

class GameRepository extends BaseRepository implements Contract
{
    public function model(): string
    {
        return Game::class;
    }

    public function checkGameWithSpecialStatus(string $status, string $playerID): bool
    {
        return $this->model
            ->where('player_id', $playerID)
            ->where('status', $status)
            ->exists();
    }

    public function addQuestions(string $id, Collection $questions)
    {
        return $this->model
            ->query()
            ->findOrFail($id)
            ->questions()
            ->sync($questions);
    }
}
