<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PruebaIngresoTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login()
    {
        // Crear un usuario con la contraseña cifrada
        $user = User::factory()->create([
            'name' => 'usuario1',
            'email' => 'usuario1@correo.cl',
            'password' => bcrypt('11111111'), // Asegurarse de cifrar la contraseña
            'activo' => 1,
            'tipo' => 'administrador'
        ]);

        // Enviar una solicitud POST para iniciar sesión
        $response = $this->post('/login', [
            'email' => 'usuario1@correo.cl',
            'password' => '11111111', // Contraseña sin cifrar (lo que se ingresará en el formulario)
        ]);

        // Verificar que el usuario haya sido autenticado
        $this->assertAuthenticatedAs($user);

        // Verificar redirección después de iniciar sesión
        $response->assertRedirect('/dashboard');
    }
}
