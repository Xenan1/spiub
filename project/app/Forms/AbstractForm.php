<?php

namespace App\Forms;

use App\Forms\Fields\AbstractField;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractForm
{
    abstract public function getFields(): array;
    abstract public function getModelClass(): string;
    public function getForResponse(): array
    {
        return array_map(function (AbstractField $field) {
            return $field->getForResponse()->getArray();
        }, $this->getFields());
    }

    public static function for(Model $model): array
    {
        $form = app(static::class);
        return array_map(function (AbstractField $field) use ($model) {
            return $field->setValue($model->{$field->getKey()})->getForResponse()->getArray();
        }, $form->getFields());
    }
}
