<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //get all projects
        $projects = Project::all();
        $teams = Team::all();

        // associate each project with a random team
        foreach ($projects as $project) {
            // Obtener un equipo aleatorio
            $team = $teams->random();

            // Associate the project with the team
            $project->teams()->attach($team->id);
        }
    }
}
