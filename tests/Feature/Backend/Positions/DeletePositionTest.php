<?php

namespace Tests\Feature\Backend\Positions;

use App\Domains\Auth\Models\User;
use App\Events\Position\PositionDeleted;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class DeletePositionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_delete_positions()
    {
        $this->actingAs(User::factory()->user()->create());

        $position = Position::factory()->create();

        $response = $this->delete(route('admin.positions.destroy', $position));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_delete_positions()
    {
        Event::fake();

        $this->loginAsAdmin();

        $position = Position::factory()->create();

        $response = $this->delete(route('admin.positions.destroy', $position));

        $response->assertSessionHas(['flash_success' => __('The position was successfully deleted.')]);

        $this->assertSoftDeleted('positions', ['id' => $position->id]);

        Event::assertDispatched(PositionDeleted::class);
    }
}
