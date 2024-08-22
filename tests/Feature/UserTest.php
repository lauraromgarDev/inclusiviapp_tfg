<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;


class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_showRegistrationForm()
    {
        //formulario carga
        Artisan::call('migrate');
        //formulario carga
        $locale = app()->getLocale();
        $url = url("/{$locale}/register");
        $response = $this->get($url)
            ->assertStatus(200)
            ->assertViewIs('auth.register')
            ->assertSessionHasNoErrors();
    }


    public function test_wrongRegistration()
    {
        $locale = app()->getLocale();
        $url = url("/{$locale}/register");

        $response = $this->from($url)->post(route('register.submit', app()->getLocale()), [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'emailmal',
            'password' => 'pass', // la contraseña debe tener al menos 8 caracteres
            'password_confirmation' => 'passwor', // la confirmación de la contraseña debe ser igual a la contraseña
            'phone_number' => '123456789',
            'address' => 'Calle falsa 123',
            'city' => 'Springfield',
            'country' => 'USA',
            'postal_code' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(url('/' . app()->getLocale() . '/register'));
    }



    public function test_correctRegistration()
    {
        $response = $this->post(route('register.submit', app()->getLocale()), [
            'name' => 'John',
            'surname' => 'Doe',
            'username' => 'johndoe',
            'email' => 'email@email.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'phone_number' => '123456789',
            'address' => 'Calle falsa 123',
            'city' => 'Springfield',
            'country' => 'USA',
            'postal_code' => '12345',
        ]);


        $response->assertStatus(302);
        $response->assertRedirect(route('main.index', ['locale' => app()->getLocale()]));
    }



    public function testUserCanLogin()
    {
        $user = User::factory()->create([
            'email' => 'apple@apple.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post(route('login', ['locale' => 'en']), [
            'email' => 'apple@apple.com',
            'password' => 'password123',
        ]);

        $expectedUrl = url('/en');

        $response->assertStatus(302);
        $response->assertRedirect($expectedUrl);

        $this->actingAs($user);
        $this->assertAuthenticated();
    }


    public function testUserCantLogin()
    {
        $response = $this->post(route('login', ['locale' => 'en']), [
            'email' => 'apple@apple.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect();
        $this->assertGuest();
    }

}


