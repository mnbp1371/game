<?php

namespace App\Contracts\Repository;

use Illuminate\Support\Collection;

interface QuestionRepository extends Repository
{
    public function getRandomQuestionIdForGame(int $take): Collection;

    public function getNextQuestionsInGame(string $gameId, string $playerId, array $with = []);
}
