<?php

namespace App\DTO;

readonly class QuestionDTO
{
    public function __construct(
        public string $text
    ) {}

    public function toArray(): array
    {
        return [
            'text' => $this->text,
        ];
    }
}
