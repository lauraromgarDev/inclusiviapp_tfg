<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\Message;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(TeamsSeeder::class);
        $this->call(ProjectTeamSeeder::class);
        $this->call(InterpreterSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(InterpretationRequestSeeder::class);




    }
}
