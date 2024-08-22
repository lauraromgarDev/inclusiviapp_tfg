<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        // we need to get the total of users to get a random user
        $totalUsers = User::count();
        $users = User::all();

        //we create a boolean to know if the student has a functional diversity
        $diversidadFuncional = $this->faker->boolean;

        // if the student has a functional diversity, we create a description
        return [
            'nombre' => function () use ($users) {
                $user = $users->random();
                return $user->name;
            },
            'apellidos' => function () use ($users) {
                $user = $users->random();
                return $user->surname;
            },
            'edad' => $this->faker->numberBetween(18, 70),
            'es_socio' => $this->faker->boolean,
            'diversidad_funcional' => $diversidadFuncional,
            // if the student has a functional diversity, we create a description else we create a null value
            'diversidad_descripcion' => $diversidadFuncional ? $this->faker->text : null,
            'email' => function () use ($users) {
                $user = $users->random();
                return $user->email;
            },
            'telefono' => function () use ($users) {
                $user = $users->random();
                return $user->phone_number;
            },
            'project_id' => $this->faker->numberBetween(1, 5),
            'user_id' => function () use ($users) {
                $user = $users->random();
                return $user->id;
            },
        ];
    }
}


