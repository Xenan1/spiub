<?php

namespace App\Forms\Fields;

use App\Forms\Fields\Resources\AbstractFieldResource;
use App\Forms\Fields\Resources\SimpleFieldResource;

class TextField extends AbstractField
{

    public static function getType(): FieldTypes
    {
        return FieldTypes::Text;
    }

    public function getForResponse(): AbstractFieldResource
    {
        return new SimpleFieldResource($this);
    }
}
