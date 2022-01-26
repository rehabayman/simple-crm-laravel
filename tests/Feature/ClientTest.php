<?php

namespace Tests\Feature;

use App\Models\Client;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed([RolesAndPermissionsSeeder::class, UserSeeder::class]);
    }

    public function test_no_clients_yet()
    {
        $credential = [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ];
    
        $response = $this->post('login', $credential);

        $response = $this->get('/clients');
        
        $response->assertSee('No clients yet');
        
        $response->assertStatus(200);
    }

    public function test_clients_found()
    {
        $credential = [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ];

        $client = Client::create([
            'contact_name' => $this->faker->name(),
            'contact_email' => $this->faker->email(),
            'contact_phone_number' => $this->faker->phoneNumber(),
            'company_name' => $this->faker->company(),
            'company_address' => $this->faker->address(),
            'company_city' => $this->faker->city(),
            'company_zip' => $this->faker->randomNumber(5),
            'company_vat' => $this->faker->randomNumber(9),
        ]);

        $response = $this->post('login', $credential);

        $response = $this->get('/clients');
        
        $response->assertDontSee('No clients yet');
        
        $response->assertSee($client->company_name);

        $response->assertStatus(200);
    }
}
