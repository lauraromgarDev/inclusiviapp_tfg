<?php

namespace Database\Seeders;

use App\Models\InterpretationRequest;
use App\Models\Interpreter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterpretationRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::statement('ALTER TABLE interpretation_requests AUTO_INCREMENT = 1;');

        InterpretationRequest::factory()
            ->count(10)
            ->create();
    }
}
