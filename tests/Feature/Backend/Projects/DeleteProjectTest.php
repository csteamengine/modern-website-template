<?php

namespace Tests\Feature\Backend\Projects;

use App\Domains\Auth\Models\User;
use App\Events\Project\ProjectDeleted;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class DeleteProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_delete_projects()
    {
        $this->actingAs(User::factory()->user()->create());

        $project = Project::factory()->create();

        $response = $this->delete(route('admin.projects.destroy', $project));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_delete_projects()
    {
        Event::fake();

        $this->loginAsAdmin();

        $project = Project::factory()->create();

        $response = $this->delete(route('admin.projects.destroy', $project));

        $response->assertSessionHas(['flash_success' => __('The project was successfully deleted.')]);

        $this->assertSoftDeleted('projects', ['id' => $project->id]);

        Event::assertDispatched(ProjectDeleted::class);
    }
}
