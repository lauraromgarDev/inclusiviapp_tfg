<?php

namespace Database\Factories;

use App\Models\Administrator;
use App\Models\InterpretationRequest;
use App\Models\Interpreter;
use App\Models\RequestChange;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class RequestChangeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = RequestChange::class;

    /**
     * Define the model's default state.
     * @return array
     */
    public function definition()
    {
        // Faker data
        return [
            'interpretation_request_id' => InterpretationRequest::factory(),
            'admin_id' => Administrator::factory(),
            'user_id' => User::factory(),
            'interpreter_id' => Interpreter::factory(),
            'change_description' => $this->faker->sentence,
        ];
    }
}
