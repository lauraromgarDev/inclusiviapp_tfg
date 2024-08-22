<?php

namespace Tests\Feature;

use App\Models\Administrator;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Lang;
use Tests\TestCase;
use Faker\Factory as Faker;


class AdminProjectsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

//    public function testAdminLogin()
//    {
//        // Verificar si el administrador ya existe en la base de datos
//        $adminExists = Administrator::where('username', 'admin123')->exists();
//
//        // Si el administrador ya existe, eliminarlo
//        if ($adminExists) {
//            Administrator::where('username', 'admin123')->delete();
//        }
//
//        // Crear un administrador de prueba
//        $admin = Administrator::create([
//            'name' => 'Admin de Prueba',
//            'surname' => 'Apellido',
//            'username' => 'admin123',
//            'email' => 'admin1@example.com',
//            'password' => bcrypt('password123'),
//            'phone_number' => '123456789',
//            'address' => 'Calle Principal',
//            'city' => 'Ciudad',
//            'country' => 'País',
//            'postal_code' => '12345',
//            'is_admin' => 1,
//        ]);
//
//        $response = $this->post(route('login', ['locale' => 'en']), [
//            'email' => $admin->email,
//            'password' => 'password123',
//        ])->withHeaders([
//            'X-CSRF-TOKEN' => csrf_token(),
//        ]);
//
//        $expectedUrl = route('admin.dashboard', ['locale' => 'en']);
//        $statusCode = $response->getStatusCode();
//        $location = $response->headers->get('Location');
//
//        $this->assertEquals(302, $statusCode);
//        $this->assertEquals($expectedUrl, $location);
//
//        // Verificar si el usuario está autenticado correctamente
//        $this->assertAuthenticatedAs($admin, 'admin');
//    }


//    public function testCreateProject()
//    {
//        // Crear un administrador de ejemplo en la base de datos y simular que entra como admin
//        $admin = Administrator::factory()->create();
//        $this->actingAs($admin, 'admin');
//
//        $faker = \Faker\Factory::create();
//
//        $projectData = [
//            'name' => $faker->name,
//            'description' => $faker->text,
//            'team_description' => $faker->text,
//            'objectives' => $faker->text,
//            'destination' => $faker->text,
//        ];
//
//        $response = $this->post(route('admin.projects.store', app()->getLocale()), $projectData);
//
//        $response->assertStatus(302); // Verificar que se redirige correctamente
//        $response->assertRedirect(route('admin.projects.index', app()->getLocale()));
//
//        // Verificar que el proyecto se creó correctamente en la base de datos
//        $this->assertDatabaseHas('projects', [
//            'name' => $projectData['name'],
//            'description' => $projectData['description'],
//            'image' => null,
//        ]);
//    }

    public function testEditProject()
    {
        // Crear un proyecto de ejemplo en la base de datos
        $project = Project::factory()->create();

        // Crear un administrador de ejemplo en la base de datos
        $admin = Administrator::factory()->create();

        // Autenticar como el usuario administrador
        $this->actingAs($admin, 'admin')->get(route('admin.projects.edit',
            ['locale' => app()->getLocale(), 'id' => $project->id]))
            ->assertStatus(200)
            ->assertViewIs('admin.projects.edit')
            ->assertViewHas('project', $project);
    }

}
