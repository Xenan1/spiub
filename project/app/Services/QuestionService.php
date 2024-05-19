<?php

namespace App\Services;

use App\DTO\QuestionDTO;
use App\Forms\QuestionForm;
use App\Repositories\QuestionRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class QuestionService
{
    public function __construct(
        private readonly QuestionRepository $questionRepository
    ) {}

    public function getAllQuestions(): Collection
    {
        return $this->questionRepository->getAll();
    }

    public function getQuestionById(int $id): Model
    {
        return $this->questionRepository->findById($id);
    }

    public function getQuestionForm(): array
    {
        return (new QuestionForm())->getForResponse();
    }

    public function createQuestion(QuestionDTO $question): void
    {
        $this->questionRepository->create($question->toArray());
    }

    public function getQuestionFormById(string $id): array
    {
        $question = $this->questionRepository->findById($id);
        return QuestionForm::for($question);
    }

    public function updateQuestionById(string $id, QuestionDTO $question): void
    {
        $this->questionRepository->updateById($id, $question->toArray());
    }

    public function deleteQuestionById(string $id): void
    {
        $this->questionRepository->deleteById($id);
    }
}
