<?php

namespace App\DTO;

readonly class AnswerDTO
{
    public function __construct(
        public string  $text,
        public ?string $question_id,
        public ?string $result_id,
    ) {}

    public function toArray(): array
    {
        return [
            'text' => $this->text,
            'question_id' => $this->question_id,
            'result_id' => $this->result_id,
        ];
    }
}
