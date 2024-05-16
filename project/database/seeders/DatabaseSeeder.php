<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->isLocal()) {
            (new QuestionSeeder())->run();
            (new ResultSeeder())->run();
            (new AnswerSeeder())->run();
        }
    }
}
