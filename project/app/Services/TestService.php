<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Result;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\ResultRepository;
use Illuminate\Support\Collection;

class TestService
{
    public function __construct(
        private readonly QuestionRepository $questionRepository,
        private readonly AnswerRepository   $answerRepository,
        private readonly ResultRepository $resultRepository
    ) {}
    public function getTestQuestions(): Collection
    {
        return $this->questionRepository->getAll(['answers']);
    }

    public function getResultByTestAnswers(array $answersIds): Result
    {
        $answersResultsIds = $this->answerRepository->getWhereIdIn($answersIds, ['result'])->pluck('result.id')->toArray();

        $answerId = array_search(max($answersResultsIds), $answersResultsIds);

        return $this->resultRepository->findById($answerId);
    }
}
