<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

//class StudentSeeder extends Seeder
//{
//    /**
//     * Run the database seeds.
//     */
//    public function run(): void
//    {
//        // Deshabilitar restricciones de clave externa
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//
//        // Truncar la tabla
//        DB::table('students')->truncate();
//
//        // Habilitar restricciones de clave externa
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
//
//        DB::statement('ALTER TABLE students AUTO_INCREMENT = 1;');
//
//        $faker = Faker::create(); // Instancia de Faker
//
//        // Generar estudiantes con datos reales de usuarios
//        $users = User::all();
//        $usersCount = $users->count();
//        $realStudentsCount = 10;
//
//        for ($i = 0; $i < $realStudentsCount; $i++) {
//            $user = $users->random();
//
//            $student = new Student();
//            $student->nombre = $user->name;
//            $student->apellidos = $user->last_name;
//            $student->edad = $faker->numberBetween(18, 70);
//            $student->es_socio = true;
//            $student->diversidad_funcional = $faker->boolean;
//            $student->diversidad_descripcion = $faker->optional()->text;
//            $student->email = $user->email;
//            $student->telefono = $user->phone_number;
//            $student->project_id = $faker->numberBetween(1, 5);
//            $student->user_id = $user->id;
//            $student->slug = $student->generateSlug();
//            $student->save();
//        }
//
//        // Generar estudiantes adicionales con datos falsos
//        $fakeStudentsCount = 5;
//
//        for ($i = 0; $i < $fakeStudentsCount; $i++) {
//            $student = new Student();
//            $student->nombre = $faker->firstName;
//            $student->apellidos = $faker->lastName;
//            $student->edad = $faker->numberBetween(18, 70);
//            $student->es_socio = false;
//            $student->diversidad_funcional = $faker->boolean;
//            $student->diversidad_descripcion = $faker->optional()->text;
//            $student->email = $faker->safeEmail;
//            $student->telefono = $faker->phoneNumber;
//            $student->project_id = $faker->numberBetween(1, 5);
//            $student->user_id = null;
//            $student->slug = $student->generateSlug();
//            $student->save();
//        }
//    }
//}


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('ALTER TABLE students AUTO_INCREMENT = 1;');

        $faker = Faker::create();

       //generate students with real user data
        $users = User::all();
        $usersCount = $users->count();
        $realStudentsCount = 10;

        // Generate unique email
        for ($i = 0; $i < $realStudentsCount; $i++) {
            $user = $users->random();

            $student = new Student();
            $student->nombre = $user->name;
            $student->apellidos = $user->surname;
            $student->edad = $faker->numberBetween(18, 70);
            $student->es_socio = true;
            $student->diversidad_funcional = $faker->boolean;
            $student->diversidad_descripcion = $student->diversidad_funcional ? $faker->text : null;

            // Generar un correo electrónico único
            $email = $this->getUniqueEmail($faker, $users);
            while (Student::where('email', $email)->exists()) {
                $email = $this->getUniqueEmail($faker, $users);
            }
            $student->email = $email;

            $student->telefono = $user->phone_number;
            $student->project_id = $faker->numberBetween(1, 5);
            $student->user_id = $user->id;
            $student->slug = $this->generateUniqueSlug($user->name, $user->surname); // Generar un slug único
            $student->save();
        }

        // generate additional students with fake data
        $fakeStudentsCount = 5;

        for ($i = 0; $i < $fakeStudentsCount; $i++) {
            $student = new Student();
            $student->nombre = $faker->firstName;
            $student->apellidos = $faker->lastName;
            $student->edad = $faker->numberBetween(18, 70);
            $student->es_socio = false;
            $student->diversidad_funcional = $faker->boolean;
            $student->diversidad_descripcion = $student->diversidad_funcional ? $faker->text : null;

            // generate unique email
            $email = $this->getUniqueEmail($faker, $users);
            while (Student::where('email', $email)->exists()) {
                $email = $this->getUniqueEmail($faker, $users);
            }
            $student->email = $email;

            $student->telefono = $faker->phoneNumber;
            $student->project_id = $faker->numberBetween(1, 5);
            $student->user_id = null;
            $student->slug = $this->generateUniqueSlug($user->name, $user->surname); // Generar un slug único
            $student->save();
        }
    }

    /**
     * Generate a unique email for the student.
     * @param Generator $faker
     * @param Collection $users
     * @return string
     */
    private function getUniqueEmail($faker, $users)
    {
        $email = $faker->unique()->safeEmail;

        while ($users->contains('email', $email) || Student::where('email', $email)->exists()) {
            $email = $faker->unique()->safeEmail;
        }

        return $email;
    }

    /**
     * Generate a unique slug based on the name and surname of the student.
     * @param string $name
     * @param string $surname
     * @return string
     */
    private function generateUniqueSlug(string $name, string $surname): string
    {
        $baseSlug = Str::slug($name . ' ' . $surname);
        $slug = $baseSlug;
        $i = 1;

        while (Student::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }

}

