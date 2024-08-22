<?php

namespace Database\Seeders;

use App\Models\Interpreter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterpreterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::statement('ALTER TABLE interpreters AUTO_INCREMENT = 1;');

        $interpreter = Interpreter::factory()->create([
            'interpreter_name' => 'Cheli Guijarro',
            'availability' => '1',
            'service' => 'ilse',
        ])->each(function ($interpreter) {
            $interpreter->slug = $interpreter->generateSlug();
            $interpreter->save();
        });


        Interpreter::factory()->create([
            'interpreter_name' => 'Lucia Guijarro',
            'availability' => '0',
            'service' => 'gilse',
        ])->each(function ($interpreter) {
            $interpreter->slug = $interpreter->generateSlug();
            $interpreter->save();
        });;


        Interpreter::factory()
            ->count(3)
            ->afterCreating(function ($interpreter) {
                $interpreter->slug = $interpreter->generateSlug();
                $interpreter->save();
            })
            ->create();

    }
}

