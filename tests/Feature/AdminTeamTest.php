<?php

namespace Tests\Feature;

use App\Models\Administrator;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTeamTest extends TestCase
{
//    public function testUpdateTeam()
//    {
//        // Crear un equipo de ejemplo en la base de datos
//        $team = new Team();
//        $team->name = 'Nombre de equipo';
//        $team->description = 'Descripción de equipo';
//        $team->project_id = 1;
//        $team->is_director = true;
//        $team->director_position = 'Puesto de director';
//        $team->director_description = 'Descripción de director';
//        $team->slug = 'nombre-de-equipo';
//        $team->save();
//
//        // Crear un administrador de ejemplo en la base de datos
//        $admin = Administrator::factory()->create();
//        $this->actingAs($admin, 'admin');
//
//        // Generar datos de ejemplo para actualizar el equipo
//        $data = [
//            'name' => 'Nuevo nombre de equipo',
//            'description' => 'Nueva descripción de equipo',
//            'project_id' => 1,
//            'is_director' => true,
//            'director_position' => 'Nuevo puesto de director',
//            'director_description' => 'Nueva descripción de director',
//        ];
//
//        // Hacer una solicitud PUT a la ruta de actualización del equipo
//        $response = $this->put(route('admin.teams.update', ['locale' => 'en', 'team' => $team->id]), $data);
//
//        // Verificar que la solicitud se haya procesado correctamente
//        $response->assertRedirect();
//
//        // Verificar que el equipo se haya actualizado correctamente en la base de datos
//        $updatedTeam = Team::find($team->id);
//        $this->assertEquals($data['name'], $updatedTeam->name);
//        $this->assertEquals($data['description'], $updatedTeam->description);
//        $this->assertEquals($data['project_id'], $updatedTeam->project_id);
//        $this->assertEquals($data['is_director'], $updatedTeam->is_director);
//        $this->assertEquals($data['director_position'], $updatedTeam->director_position);
//        $this->assertEquals($data['director_description'], $updatedTeam->director_description);
//
//        // Verificar que se haya redirigido correctamente después de la actualización
//        $response->assertRedirect('/en/teams');
//
//        // Verificar que se haya mostrado el mensaje de éxito
//        $response->assertSessionHas('success');
//    }

    public function testDestroyTeam()
    {
        // Crear un equipo de ejemplo en la base de datos y un admin
        $team = Team::factory()->create();
        $admin = Administrator::factory()->create();

        // Autenticar como el usuario administrador
        $this->actingAs($admin, 'admin');

        $response = $this->delete(route('admin.teams.destroy', ['locale' => 'en', 'team' => $team->id]));
        $response->assertRedirect();

        // Verificar que el equipo no exista en la base de datos
        $this->assertDatabaseMissing('teams', ['id' => $team->id]);

        $response->assertRedirect('/en/teams');
        $response->assertSessionHas('success');
    }
}
