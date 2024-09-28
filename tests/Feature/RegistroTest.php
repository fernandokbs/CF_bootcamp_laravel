<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistroTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        // Simular una solicitud POST para registrar un nuevo usuario
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Verificar que el usuario haya sido autenticado
        $this->assertAuthenticated();

        // Verificar que se haya registrado en la base de datos
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);

        // Verificar redirección después del registro (ajustado a /dashboard)
        $response->assertRedirect('/dashboard');
    }

    public function test_user_cannot_register_with_invalid_data()
    {
        // Simular una solicitud POST con datos inválidos
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => 'short',
            'password_confirmation' => 'different-password',
        ]);

        // Verificar que no esté autenticado
        $this->assertGuest();

        // Verificar que haya errores en la validación
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }
}
