<?php

namespace App\Forms;

use App\Forms\Fields\SelectFieldInterface;
use App\Forms\Fields\TextField;
use App\Models\Answer;
use App\Repositories\QuestionRepository;
use App\Repositories\ResultRepository;

class AnswerForm extends AbstractForm
{
    public function __construct(
        private readonly QuestionRepository $questionRepository,
        private readonly ResultRepository   $resultRepository,
    ) {}

    public function getFields(): array
    {
        return [
            new TextField('text', 'Текст'),
            (new SelectFieldInterface('question_id', 'Вопрос', $this->questionRepository->getAll()))
                ->setOptionLabel('text'),
            (new SelectFieldInterface('result_id', 'Результат', $this->resultRepository->getAll()))
                ->setOptionLabel('header'),
        ];
    }

    public function getModelClass(): string
    {
        return Answer::class;
    }
}
