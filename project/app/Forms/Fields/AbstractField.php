<?php

namespace App\Forms\Fields;

use App\Forms\Fields\Resources\AbstractFieldResource;

abstract class AbstractField
{
    private mixed $value = null;

    public function __construct(
        private readonly string $key,
        private readonly string $name
    ) {}

    abstract public static function getType(): FieldTypes;

    abstract public function getForResponse(): AbstractFieldResource;

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
