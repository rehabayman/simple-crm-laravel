<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Database\Seeders\ClientSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            RolesAndPermissionsSeeder::class, 
            UserSeeder::class,
            ClientSeeder::class
        ]);
        
        $this->user = User::whereEmail('admin@admin.com')->first();
    }

    public function test_empty_projects()
    {
        $response = $this->actingAs($this->user)->get('/projects');
        
        $response->assertSee('No projects yet');
        
        $response->assertStatus(200);
    }

    public function test_projects_pagination()
    {
        $projects = Project::factory()->count(11)->create();

        $response = $this->actingAs($this->user)->get('/projects');
        
        $response->assertDontSee($projects->last()->name);
        
        $response->assertStatus(200);
    }

}
