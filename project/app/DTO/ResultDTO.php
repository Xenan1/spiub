<?php

namespace App\DTO;

readonly class ResultDTO
{
    public function __construct(
        public string $header,
        public ?string $text = ''
    ) {}

    public function toArray(): array
    {
        return [
            'header' => $this->header,
            'text' => $this->text,
        ];
    }
}
