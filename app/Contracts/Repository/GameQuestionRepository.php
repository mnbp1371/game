<?php

namespace App\Contracts\Repository;

interface GameQuestionRepository
{
    public function analytics();

    public function update(string $questionId, string $gameId, array $data): int;
}
