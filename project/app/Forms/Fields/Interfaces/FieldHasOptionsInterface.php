<?php

namespace App\Forms\Fields\Interfaces;

use Illuminate\Support\Collection;

interface FieldHasOptionsInterface
{
    public function getOptions(): Collection;
    public function getOptionKey(): string;
    public function getOptionLabel(): string;
    public function setOptionKey(string $key): static;
    public function setOptionLabel(string $label): static;
}
