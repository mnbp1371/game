<?php

namespace App\Repositories\Db;

use App\Contracts\Repository\GameRepository as Contract;
use App\Models\Game;

class GameRepository extends BaseRepository implements Contract
{
    public function model(): string
    {
        return Game::class;
    }
}
