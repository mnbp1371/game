<?php

namespace App\Contracts\Repository;

interface Repository
{
    public function find($id, ?array $with = [], bool $withTrash = false);

    public function all(?array $with = [], ?array $filters = [], ?array $select = [], bool $withTrash = false);

    public function update(array $data, $id, bool $withTrash = false);

    public function create(array $data);

    public function delete(string $id);
}
