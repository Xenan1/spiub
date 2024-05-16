<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Result;
use Database\Factories\traits\FactoryHasPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Answer>
 */
class AnswerFactory extends Factory
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
            'text' => fake()->sentence(8),
            'result_id' => Result::query()->inRandomOrder()->first()->id,
        ];
    }

    public function forQuestion(Question $question): Factory
    {
        return $this->state([
            'question_id' => $question->id,
        ]);
    }
}
