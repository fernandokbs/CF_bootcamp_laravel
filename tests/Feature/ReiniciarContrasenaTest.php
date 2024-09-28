<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReiniciarContrasenaTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login()
    {
        // Crear un usuario
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'), // Asegúrate de que la contraseña esté encriptada
        ]);

        // Enviar una solicitud POST para iniciar sesión
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password',
        ]);

        // Verificar que el usuario haya sido autenticado
        $this->assertAuthenticatedAs($user);

        // Verificar redirección después de iniciar sesión (ajustado a /dashboard)
        $response->assertRedirect('/dashboard');
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        // Crear un usuario
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        // Enviar una solicitud POST con una contraseña incorrecta
        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'invalid-password',
        ]);

        // Verificar que no esté autenticado
        $this->assertGuest();

        // Verificar que se redirige a la página principal en lugar de /login
        $response->assertRedirect('/');

        // Verificar que haya un error en la sesión
        $response->assertSessionHasErrors('email');
    }
}
