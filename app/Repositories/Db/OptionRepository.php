<?php

namespace App\Repositories\Db;

use App\Contracts\Repository\OptionRepository as Contract;
use App\Models\Option;

class OptionRepository extends BaseRepository implements Contract
{
    public function model(): string
    {
        return Option::class;
    }

    public function isCorrect(string $questionId, string $optionId): bool
    {
        return $this->model->query()
            ->where('question_id', $questionId)
            ->where('id', $optionId)
            ->where('is_correct', true)
            ->exists();
    }

    public function correctCount(string $questionId): int
    {
        return Option::query()
            ->where('question_id', $questionId)
            ->where('is_correct', true)
            ->count();
    }
}
