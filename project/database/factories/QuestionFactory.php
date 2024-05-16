<?php

namespace Database\Factories;

use App\Models\Question;
use Database\Factories\traits\FactoryHasPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{
    use FactoryHasPosition;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => fake()->text(),
        ];
    }
}
