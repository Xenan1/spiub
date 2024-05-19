<?php

namespace App\Repositories;

use App\Models\Question;

class QuestionRepository extends AbstractRepository
{

    protected static function getModelClass(): string
    {
        return Question::class;
    }
}
