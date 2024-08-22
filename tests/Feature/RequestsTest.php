<?php

namespace Tests\Feature;

use App\Mail\InterpretationRequestMail;
use App\Models\Interpreter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;


class RequestsTest extends TestCase
{
    public function test_user_can_request_interpretation()
    {
        Mail::fake();

        $user = User::factory()->create();
        $interpreter = Interpreter::factory()->create();

        $data = [
            'user_id' => $user->id,
            'interpreter_id' => $interpreter->id,
            'request_date' => '2023-06-11 10:00:00',
            'request_message' => 'Test interpretation request',
            'service' => 'ilse',
            'email' => 'john@example.com',
            'telefono' => '123456789',
        ];

        $locale = app()->getLocale();
        $response = $this->post("$locale/user/solicitar-interprete", $data);

        $response->assertRedirect();

        Mail::assertSent(InterpretationRequestMail::class, function ($mail) use ($data) {
            return $mail->hasTo('laura.inclusiviapp@gmail.com') &&
                $mail->datosSolicitud['user_id'] === $data['user_id'] &&
                $mail->datosSolicitud['interpreter_id'] === $data['interpreter_id'] &&
                $mail->datosSolicitud['request_date'] === $data['request_date'] &&
                $mail->datosSolicitud['request_message'] === $data['request_message'] &&
                $mail->datosSolicitud['service'] === $data['service'] &&
                $mail->datosSolicitud['email'] === $data['email'] &&
                $mail->datosSolicitud['telefono'] === $data['telefono'];
        });
    }

}
