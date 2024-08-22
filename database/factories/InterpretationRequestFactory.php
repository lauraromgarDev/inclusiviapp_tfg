<?php

namespace Database\Factories;

use App\Models\InterpretationRequest;
use App\Models\Interpreter;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends Factory<InterpretationRequest>
 */
class InterpretationRequestFactory extends Factory

{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = InterpretationRequest::class;


    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition()
    {

        //this user is get from the database randomly. We get one.
        $user = User::query()->inRandomOrder()->first();
        //We create a random service from the array
        $service = $this->faker->randomElement(['ilse', 'gilse']);
        //We get a random interpreter from the database and we get one.
        $interpreter = Interpreter::where('service', $service)->inRandomOrder()->first();

        // Faker data
        return [
            'user_id' => $user->id,
            'interpreter_id' => $interpreter->id,
            'request_date' => $this->faker->dateTimeBetween('now', '+1 week'),
            'request_message' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pendiente', 'aceptada', 'rechazada']),
            'service' => $service,
        ];
    }
}
