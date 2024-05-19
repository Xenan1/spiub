<?php

namespace App\Forms;


use App\Forms\Fields\StringField;
use App\Forms\Fields\TextField;
use App\Models\Result;

class ResultForm extends AbstractForm
{

    public function getFields(): array
    {
        return [
            new StringField('header', 'Заголовок'),
            new TextField('text', 'Текст'),
        ];
    }

    public function getModelClass(): string
    {
        return Result::class;
    }
}
