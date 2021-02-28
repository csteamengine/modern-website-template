<?php

namespace Tests\Feature\Backend\Positions;

use App\Domains\Auth\Models\User;
use App\Events\Position\PositionCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CreatePositionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_create_positions()
    {
        $this->actingAs(User::factory()->user()->create());

        $response = $this->get('/admin/positions/create');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_create_positions_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/positions/create');

        $response->assertOk();
    }

    /** @test */
    public function admin_can_create_new_position()
    {
        Event::fake();

        $this->loginAsAdmin();

        $response = $this->post('/admin/positions', [
            'title' => "Fake Title",
            'company' => 'Fake Company',
            'short_description' => 'Fake Short Description',
            'description' => 'Fake Description',
            'page_content' => '<h1>Fake Page Content</h1>',
            'external_url' => 'https://www.example.com',
            'start_date' => '10/05/1994',
            'end_date' => '10/05/2020',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'positions',
            [
                'title' => "Fake Title",
                'company' => 'Fake Company',
                'short_description' => 'Fake Short Description',
                'description' => 'Fake Description',
                'page_content' => '<h1>Fake Page Content</h1>',
                'external_url' => 'https://www.example.com',
                'start_date' => '10/05/1994',
                'end_date' => '10/05/2020',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Created the Position')]);

        Event::assertDispatched(PositionCreated::class);
    }
}
