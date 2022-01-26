<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed([RolesAndPermissionsSeeder::class, UserSeeder::class]);
    }

    public function test_login_redirects_successfully()
    {
        $credentials = [
            'email' => 'user@user.com',
            'password' => 'password'
        ];

        $response = $this->post('/login', $credentials);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    public function test_normal_user_doesnt_access_clients()
    {
        $user = User::whereEmail('user@user.com')->first();
        $response = $this->actingAs($user)->get('/clients');
        $response->assertStatus(403);
    }
}
