<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_login()
    {
        // Crear un usuario en la base de datos
        $user = User::factory()->create([
            'email' => 'prueba@prueba.cl',
            'password' => bcrypt('123456789'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')                // Visitar la página de login
                ->type('email', $user->email)    // Rellenar el campo de email
                ->type('password', '123456789')   // Rellenar el campo de contraseña
                ->press('LOG IN')                  // Presionar el botón de Login
                ->assertPathIs('/dashboard')     // Verificar que la redirección sea a /dashboard
                ->assertSee('Dashboard');        // Verificar que se muestre "Dashboard"
        });
    }

    public function test_user_cannot_login_with_invalid_credentials()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')                  // Visitar la página de login
                ->type('email', 'invalid@example.com')  // Introducir un email no válido
                ->type('password', 'invalidpassword')   // Introducir una contraseña no válida
                ->press('LOG IN')                      // Presionar el botón de Login
                ->assertPathIs('/login')               // Verificar que se mantiene en /login
                ->assertSee('These credentials do not match our records.'); // Verificar el mensaje de error
        });
    }
}
