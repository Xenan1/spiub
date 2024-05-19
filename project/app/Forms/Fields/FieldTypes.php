<?php

namespace App\Forms\Fields;

enum FieldTypes: string
{
    case String = 'string';
    case Text = 'text';
    case Select = 'select';
}
