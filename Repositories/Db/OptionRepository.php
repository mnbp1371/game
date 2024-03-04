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
}
