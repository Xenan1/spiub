<?php

namespace Database\Factories\traits;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
trait FactoryHasPosition
{
    private static int $position = 1;
    public function positionIncrement(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'position' => static::$position++,
            ];
        });
    }

    public static function resetPosition(): void
    {
        static::$position = 1;
    }
}
