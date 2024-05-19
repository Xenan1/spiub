<?php

namespace App\Repositories;

use App\Models\Result;

class ResultRepository extends AbstractRepository
{

    protected static function getModelClass(): string
    {
        return Result::class;
    }
}
