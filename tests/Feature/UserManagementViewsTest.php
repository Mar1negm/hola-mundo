<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementViewsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_registration_screen_displays_the_registration_form(): void
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertViewIs('auth.register')
            ->assertSee('Registrar nuevo usuario')
            ->assertSee('name="_token"', false);
    }

    public function test_user_catalog_displays_registered_users(): void
    {
        User::factory()->create([
            'name' => 'Ana García',
            'email' => 'ana@example.com',
        ]);

        $this->get(route('users.index'))
            ->assertOk()
            ->assertViewIs('users.index')
            ->assertSee('Ana García')
            ->assertSee('ana@example.com');
    }

    public function test_user_catalog_can_be_filtered_by_name_or_email(): void
    {
        User::factory()->create([
            'name' => 'Ana García',
            'email' => 'ana@example.com',
        ]);
        User::factory()->create([
            'name' => 'Luis Pérez',
            'email' => 'luis@example.com',
        ]);

        $this->get(route('users.index', ['search' => 'ana@example.com']))
            ->assertOk()
            ->assertSee('Ana García')
            ->assertDontSee('Luis Pérez');
    }

    public function test_profile_screen_prefills_the_authenticated_user(): void
    {
        $user = User::factory()->create([
            'name' => 'Mariana Hernández',
            'email' => 'mariana@example.com',
        ]);

        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertViewIs('users.edit')
            ->assertSee('Mariana Hernández')
            ->assertSee('mariana@example.com')
            ->assertSee('name="_method" value="PUT"', false);
    }
}
