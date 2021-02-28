<?php

namespace Tests\Feature\Backend\Projects;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_create_projects()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/admin/projects/create');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }
}
