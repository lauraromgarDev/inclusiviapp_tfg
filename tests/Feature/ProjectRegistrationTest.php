<?php

use App\Mail\InscripcionFormMail;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ProjectRegistrationTest extends TestCase
{
    use RefreshDatabase;



    public function test_student_registration_success()
    {
        Mail::fake();
        $project = Project::factory()->create();

        $data = [
            'nombre' => 'John',
            'apellidos' => 'Doe',
            'edad' => 25,
            'es_socio' => 1,
            'diversidad_funcional' => 'true',
            'diversidad_descripcion' => 'Descripción de diversidad funcional',
            'email' => 'john@example.com',
            'telefono' => '123456789',
            'project_id' => $project->id,
        ];

        $locale = app()->getLocale();
        $response = $this->post("$locale/formulario-inscripcion", $data);
        $response->assertRedirect();
        $response->assertSessionHas('message_sent');

        Mail::assertSent(InscripcionFormMail::class, function ($mail) use ($data) {
            return $mail->hasTo('laura.inclusiviapp@gmail.com') &&
                $mail->datosInscripcion['nombre'] === $data['nombre'] &&
                $mail->datosInscripcion['apellidos'] === $data['apellidos'] &&
                $mail->datosInscripcion['email'] === $data['email'] &&
                $mail->datosInscripcion['telefono'] === $data['telefono'] &&
                $mail->datosInscripcion['project_id'] === $data['project_id'];

        });
    }

    public function test_student_wrong_registration()
    {
        Mail::fake();
        $project = Project::factory()->create();

        $data = [
            'apellidos' => 'Doe',
            'edad' => 25,
            'es_socio' => 1,
            'diversidad_funcional' => 'true',
            'diversidad_descripcion' => 'Descripción de diversidad funcional',
            'email' => 'john@example.com',
            'telefono' => '123456789',
            'project_id' => $project->id,
        ];

        $locale = app()->getLocale();
        $response = $this->post("$locale/formulario-inscripcion", $data);

        $response->assertSessionMissing('message_sent');

        Mail::assertNotSent(InscripcionFormMail::class);
    }


}
