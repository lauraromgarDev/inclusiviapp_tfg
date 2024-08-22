<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{

    public function run()
    {

        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');


        $user = User::factory()->create([
            'name' => 'Michelle',
            'surname' => 'Gavilan',
            'username' => 'apple',
            'email' => 'apple@apple.com',
            'password' => bcrypt('password123'),
        ]);

        $user->slug = $user->generateSlug();
        $user->save();

        $users = User::factory()->count(30)->create();

    }

}
