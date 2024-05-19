<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class AbstractRepository implements RepositoryInterface
{
    private Model $model;

    abstract protected static function getModelClass(): string;

    final public function __construct()
    {
        $this->setModel(app(static::getModelClass()));
    }

    public function getAll($relations = []): Collection
    {
        return $this->getModel()->query()->with($relations)->get();
    }

    public function getWhereIdIn(array $ids, array $relations = []): Collection
    {
        return $this->getModel()->query()->with($relations)->whereIn('id', $ids)->get();
    }

    public function findById(int $id, $relations = []): Model
    {
        return $this->getModel()->query()->with($relations)->findOrFail($id);
    }

    public function create(array $data): void
    {
        $this->getModel()->query()->create($data);
    }

    public function updateById(string $id, array $data): void
    {
        $this->getModel()->query()->findOrFail($id)->update($data);
    }

    public function deleteById(string $id): void
    {
        $this->getModel()->query()->findOrFail($id)->delete();
    }

    final protected function getModel(): Model
    {
        return $this->model;
    }

    private function setModel(Model $model): void
    {
        $this->model = $model;
    }
}
