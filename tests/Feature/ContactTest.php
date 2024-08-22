<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    public function test_send_contact_email()
    {
        Mail::fake();
        $details = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message',
        ];

        $locale = app()->getLocale();
        $response = $this->post("$locale/contacto", $details);
        $response->assertRedirect();
        $response->assertSessionHas('message_sent');

        Mail::assertSent(ContactMail::class, function ($mail) use ($details) {
            return $mail->hasTo('laura.inclusiviapp@gmail.com') &&
                $mail->details['name'] === $details['name'] &&
                $mail->details['email'] === $details['email'] &&
                $mail->details['subject'] === $details['subject'] &&
                $mail->details['message'] === $details['message'];
        });
    }

    public function test_wrong_send_contact_email()
    {
        Mail::fake();

        $details = [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'subject' => '',
            'message' => 'This is a test message',
        ];

        $locale = app()->getLocale();
        $response = $this->post("$locale/contacto", $details);

        $response->assertRedirect();
        $response->assertSessionMissing('message_sent');

        Mail::assertNotSent(ContactMail::class);
    }
}
