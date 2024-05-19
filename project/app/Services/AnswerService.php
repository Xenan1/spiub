<?php

namespace App\Services;

use App\DTO\AnswerDTO;
use App\Forms\AnswerForm;
use App\Repositories\AnswerRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class AnswerService
{
    private const DEFAULT_RELATIONS_SET = ['question', 'result'];

    public function __construct(
        private readonly AnswerRepository $answerRepository
    ) {}

    public function getAllAnswers(): Collection
    {
        return $this->answerRepository->getAll(self::DEFAULT_RELATIONS_SET);
    }

    public function getAnswerById(int $id): Model
    {
        return $this->answerRepository->findById($id, self::DEFAULT_RELATIONS_SET);
    }

    public function getAnswerForm(): array
    {
        return app(AnswerForm::class)->getForResponse();
    }

    public function createAnswer(AnswerDTO $answer): void
    {
        $this->answerRepository->create($answer->toArray());
    }

    public function getAnswerFormById(string $id): array
    {
        $answer = $this->answerRepository->findById($id);
        return AnswerForm::for($answer);
    }

    public function updateAnswerById(string $id, AnswerDTO $answer): void
    {
        $this->answerRepository->updateById($id, $answer->toArray());
    }

    public function deleteAnswerById(string $id): void
    {
        $this->answerRepository->deleteById($id);
    }
}
