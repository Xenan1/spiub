<?php

namespace App\Forms;

use App\Forms\Fields\StringField;
use App\Models\Question;

class QuestionForm extends AbstractForm
{

    public function getFields(): array
    {
        return [
            new StringField('text', 'Текст вопроса'),
        ];
    }

    public function getModelClass(): string
    {
        return Question::class;
    }
}
