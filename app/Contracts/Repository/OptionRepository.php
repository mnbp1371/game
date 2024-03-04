<?php

namespace App\Contracts\Repository;

interface OptionRepository extends Repository
{
    public function isCorrect(string $questionId, string $optionId): bool;

    public function correctCount(string $questionId): int;
}
