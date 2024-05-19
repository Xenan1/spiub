<?php

namespace App\Forms\Fields\Resources;

class SimpleFieldResource extends AbstractFieldResource
{

    public function addToArray(): array
    {
        return [
            'value' => $this->whenNotNull($this->field->getValue()),
        ];
    }
}
