<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('ALTER TABLE administrators AUTO_INCREMENT = 1;');

        Administrator::factory()->create([
            'name' => 'Laura',
            'surname' => 'Romero',
            'username' => 'lromgar155',
            'email' => 'lromgar155@g.educaand.es',
            'password' => bcrypt('password123'),
        ]);

        Administrator::factory()->create([
            'name' => 'Cheli',
            'surname' => 'Guijarro',
            'username' => 'cheligui',
            'email' => 'cheli@gmail.com'
        ]);

        Administrator::factory()->create([
            'name' => 'Lucia',
            'surname' => 'Guijarro',
            'username' => 'lucigui',
            'email' => 'luci@gmail.com'
        ]);
    }
}
