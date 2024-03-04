<?php

namespace App\Repositories\Db;

use App\Contracts\Repository\GameRepository as Contract;
use App\Models\Question;

class QuestionRepository extends BaseRepository implements Contract
{
    public function model(): string
    {
        return Question::class;
    }
}
