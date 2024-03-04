<?php

namespace App\Repositories\Db;

use App\Contracts\Repository\Repository;
use App\Exceptions\Repository\Invalid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

abstract class BaseRepository implements Repository
{
    protected Model $model;

    protected string $defaultSort = 'id';

    public function __construct()
    {
        $this->makeModel();
    }

    public function all(?array $with = [], $filters = [], $select = [], bool $withTrash = false): mixed
    {
        $items = $this->model::query();
        if ($select) {
            $items = $items->select($select);
        }

        if ($filters) {
            foreach ($filters as $key => $value) {
                $items = $items->where($key, $value);
            }
        }

        return $items->with($with)->orderByDesc($this->defaultSort)->paginate();
    }

    public function find($id, ?array $with = [], bool $withTrash = false): ?Model
    {
        return $this->model::with($with)->findOrFail($id);
    }

    public function update(array $data, $id, bool $withTrash = false): ?Model
    {
        $record = $this->find($id);
        $record->update($data);
        $this->clearCache();

        return $record;
    }

    public function create(array $data): Model|Builder
    {
        $entity = $this->model->query()->create($data);
        $this->clearCache();

        return $entity;
    }

    public function delete(string $id): ?Model
    {
        $entity = $this->find($id);
        $entity->delete();
        $this->clearCache();

        return $entity;
    }

    protected function makeModel(): void
    {
        $model = app($this->model());
        if (! $model instanceof Model) {
            throw new Invalid("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        $this->model = $model;
    }

    protected function clearCache()
    {
        if (property_exists($this->model, 'cacheTag')) {
            Cache::tags($this->model->cacheTag)->flush();
        }
    }

    abstract protected function model(): string;
}
