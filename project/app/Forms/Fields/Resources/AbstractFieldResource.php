<?php

namespace App\Forms\Fields\Resources;

use App\Forms\Fields\AbstractField;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class AbstractFieldResource extends JsonResource
{
    protected AbstractField $field;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->field = $resource;
    }

    abstract public function addToArray(): array;

    public function toArray(Request $request): array
    {
        return $this->getArray();
    }

    public function getArray(): array
    {
        return [
            'type' => $this->field->getType()->value,
            'data' => array_merge(
                [
                    'name' => $this->field->getName(),
                    'key' => $this->field->getKey(),
                ],
                $this->field->getForResponse()->addToArray()
            ),
        ];
    }
}
