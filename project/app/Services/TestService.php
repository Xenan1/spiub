<?php

namespace App\Services;

use App\Models\Question;
use Illuminate\Support\Collection;

class TestService
{
    public function getTestQuestions(): Collection
    {
        return Question::query()->with('answers')->orderBy('position')->get();
    }
}
