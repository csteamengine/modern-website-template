<?php

namespace Tests\Feature\Backend\Positions;

use App\Domains\Auth\Models\User;
use App\Events\Position\PositionCreated;
use App\Events\Position\PositionUpdated;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class UpdatePositionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_update_positions()
    {
        $this->actingAs(User::factory()->user()->create());

        $position = Position::factory()->create();

        $response = $this->get(route('admin.positions.edit', $position));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_edit_positions_page()
    {
        $this->loginAsAdmin();

        $position = Position::factory()->create();

        $response = $this->get(route('admin.positions.edit', $position));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_update_position()
    {
        Event::fake();

        $this->loginAsAdmin();

        $position = Position::factory()->create();

        $response = $this->patch(route('admin.positions.update', $position), [
            'title' => "Fake Title Update",
            'company' => 'Fake Company Update',
            'short_description' => 'Fake Short Description Update',
            'description' => 'Fake Description Update',
            'page_content' => '<h1>Fake Page Content Update</h1>',
            'external_url' => 'https://www.example.com/update',
            'start_date' => '10/05/1995',
            'end_date' => '10/05/2021',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'positions',
            [
                'title' => "Fake Title Update",
                'company' => 'Fake Company Update',
                'short_description' => 'Fake Short Description Update',
                'description' => 'Fake Description Update',
                'page_content' => '<h1>Fake Page Content Update</h1>',
                'external_url' => 'https://www.example.com/update',
                'start_date' => '10/05/1995',
                'end_date' => '10/05/2021',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Updated the Position')]);

        Event::assertDispatched(PositionUpdated::class);
    }
}
