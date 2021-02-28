<?php

namespace Tests\Feature\Backend\Links;

use App\Domains\Auth\Models\User;
use App\Events\Link\LinkCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CreateLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_create_links()
    {
        $this->actingAs(User::factory()->user()->create());

        $response = $this->get('/admin/links/create');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_create_links_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/links/create');

        $response->assertOk();
    }

    /** @test */
    public function admin_can_create_new_link()
    {
        Event::fake();

        $this->loginAsAdmin();

        $response = $this->post('/admin/links', [
            'title' => "Fake Title",
            'description' => 'Fake Description',
            'url' => 'https://www.example.com',
            'start_date' => '10/05/1994',
            'end_date' => '10/05/2020',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'links',
            [
                'title' => "Fake Title",
                'description' => 'Fake Description',
                'url' => 'https://www.example.com',
                'start_date' => '1994-10-05 00:00:00',
                'end_date' => '2020-10-05 00:00:00',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Created the Link')]);

        Event::assertDispatched(LinkCreated::class);
    }
}
