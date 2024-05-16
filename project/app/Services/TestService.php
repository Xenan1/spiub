<?php

namespace App\Services;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Support\Collection;

class TestService
{
    public function getTestQuestions(): Collection
    {
        return Question::query()->with('answers')->orderBy('position')->get();
    }

    public function getResultByTestAnswers(array $answersIds): Result
    {
        $answersResultsIds = Answer::query()->whereIn('id', $answersIds)
            ->with('result')->get()->pluck('result.id')->toArray();

        $answerId = array_search(max($answersResultsIds), $answersResultsIds);

        return Result::query()->find($answerId);
    }
}
