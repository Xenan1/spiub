<?php

namespace App\Forms\Fields;

use App\Forms\Fields\Interfaces\FieldHasOptionsInterface;
use App\Forms\Fields\Resources\AbstractFieldResource;
use App\Forms\Fields\Resources\SelectFieldResource;
use Illuminate\Support\Collection;

class SelectFieldInterface extends AbstractField implements FieldHasOptionsInterface
{
    private Collection $options;
    private string $optionKey = 'id';
    private string $optionLabel = 'name';

    public function __construct(string $key, string $name, Collection $options)
    {
        parent::__construct($key, $name);
        $this->options = $options;
    }

    public static function getType(): FieldTypes
    {
        return FieldTypes::Select;
    }

    public function getForResponse(): AbstractFieldResource
    {
        return new SelectFieldResource($this);
    }

    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function getOptionKey(): string
    {
        return $this->optionKey;
    }

    public function getOptionLabel(): string
    {
        return $this->optionLabel;
    }

    public function setOptionKey(string $key): static
    {
        $this->optionKey = $key;
        return $this;
    }

    public function setOptionLabel(string $label): static
    {
        $this->optionLabel = $label;
        return $this;
    }
}
