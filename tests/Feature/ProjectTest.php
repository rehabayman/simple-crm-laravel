<?php

namespace Tests\Feature;

use App\Models\Project;
use Database\Seeders\ClientSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            RolesAndPermissionsSeeder::class, 
            UserSeeder::class,
            ClientSeeder::class
        ]);
    }

    public function test_empty_projects()
    {
        $credential = [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ];
    
        $response = $this->post('login', $credential);

        $response = $this->get('/projects');
        
        $response->assertSee('No projects yet');
        
        $response->assertStatus(200);
    }

    public function test_projects_pagination()
    {
        $credential = [
            'email' => 'admin@admin.com',
            'password' => 'password'
        ];
    
        $response = $this->post('login', $credential);

        $projects = Project::factory()->count(11)->create();

        $response = $this->get('/projects');
        
        $response->assertDontSee($projects->last()->name);
        
        $response->assertStatus(200);
    }

}
