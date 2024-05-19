<?php

namespace App\Repositories;

use App\Models\Answer;

class AnswerRepository extends AbstractRepository
{

    protected static function getModelClass(): string
    {
        return Answer::class;
    }
}
