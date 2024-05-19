<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function getAll(array $relations): Collection;
    public function findById(int $id, array $relations): Model;
    public function getWhereIdIn(array $ids, array $relations = []): Collection;
    public function create(array $data): void;
    public function updateById(string $id, array $data): void;
    public function deleteById(string $id): void;
}
