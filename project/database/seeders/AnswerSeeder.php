<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Database\Factories\AnswerFactory;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Question::query()->get() as $question) {
            Answer::factory(4)->forQuestion($question)->positionIncrement()->create();
            AnswerFactory::resetPosition();
        }
    }
}
