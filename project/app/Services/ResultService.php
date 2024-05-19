<?php

namespace App\Services;

use App\DTO\ResultDTO;
use App\Forms\ResultForm;
use App\Repositories\ResultRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ResultService
{
    public function __construct(
        private readonly ResultRepository $resultRepository
    ) {}

    public function getAllResults(): Collection
    {
        return $this->resultRepository->getAll();
    }

    public function getResultById(int $id): Model
    {
        return $this->resultRepository->findById($id);
    }

    public function getResultForm(): array
    {
        return (new ResultForm())->getForResponse();
    }

    public function createResult(ResultDTO $result): void
    {
        $this->resultRepository->create($result->toArray());
    }

    public function getResultFormById(string $id): array
    {
        $result = $this->resultRepository->findById($id);
        return ResultForm::for($result);
    }

    public function updateResultById(string $id, ResultDTO $result): void
    {
        $this->resultRepository->updateById($id, $result->toArray());
    }

    public function deleteResultById(string $id): void
    {
        $this->resultRepository->deleteById($id);
    }
}
