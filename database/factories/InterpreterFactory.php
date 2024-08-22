<?php

namespace Database\Factories;

use App\Models\Interpreter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Interpreter>
 */
class InterpreterFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Faker data
        return [
            'interpreter_name' => fake()->name,
            'availability' => fake()->boolean,
            'service' => fake()->randomElement(['ilse', 'gilse']),
        ];
    }
}
