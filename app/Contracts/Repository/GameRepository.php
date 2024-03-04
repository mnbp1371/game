<?php

namespace App\Contracts\Repository;

use Illuminate\Support\Collection;

interface GameRepository extends Repository
{
    public function checkGameWithSpecialStatus(string $status, string $playerID): bool;

    public function addQuestions(string $id, Collection $questions);
}
