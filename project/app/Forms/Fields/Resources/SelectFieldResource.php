<?php

namespace App\Forms\Fields\Resources;

use App\Forms\Fields\Interfaces\FieldHasOptionsInterface;
use LogicException;
use UnexpectedValueException;

class SelectFieldResource extends AbstractFieldResource
{
    public function __construct($resource)
    {
        if (!$resource instanceof FieldHasOptionsInterface) {
            throw new LogicException('Select field must implement FieldHasOptions interface');
        }
        parent::__construct($resource);
    }

    public function addToArray(): array
    {
        $optionsList = $this->field->getOptions()->groupBy($this->field->getOptionKey())->toArray();
        $value = $this->field->getValue()
            ? $this->getOptionArray(
                    $optionsList[$this->field->getValue()]
                )
            : null;
        return [
            'value' => $value,
            'options' => array_map(function ($option) {
                return $this->getOptionArray($option);
            }, $optionsList)
        ];
    }

    private function getOptionArray($option): array
    {
        if (!array_key_exists(0, $option)) {
            throw new UnexpectedValueException('No option with this key');
        }
        $option = $option[0];
        return [
            'key' => $option[$this->field->getOptionKey()],
            'label' => $option[$this->field->getOptionLabel()],
        ];
    }
}
