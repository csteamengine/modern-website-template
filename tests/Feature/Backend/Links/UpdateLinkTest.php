<?php

namespace Tests\Feature\Backend\Links;

use App\Domains\Auth\Models\User;
use App\Events\Link\LinkCreated;
use App\Events\Link\LinkUpdated;
use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class UpdateLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_update_links()
    {
        $this->actingAs(User::factory()->user()->create());

        $link = Link::factory()->create();

        $response = $this->get(route('admin.links.edit', $link));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_edit_links_page()
    {
        $this->loginAsAdmin();

        $link = Link::factory()->create();

        $response = $this->get(route('admin.links.edit', $link));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_update_link()
    {
        Event::fake();

        $this->loginAsAdmin();

        $link = Link::factory()->create();

        $response = $this->patch(route('admin.links.update', $link), [
            'title' => "Fake Title Update",
            'description' => 'Fake Description Update',
            'page_content' => '<h1>Fake Page Content Update</h1>',
            'url' => 'https://www.example.com/update',
            'external_url' => 'https://www.example.com/update',
            'start_date' => '10/05/1995',
            'end_date' => '10/05/2021',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'links',
            [
                'title' => "Fake Title Update",
                'description' => 'Fake Description Update',
                'url' => 'https://www.example.com/update',
                'start_date' => '1995-10-05 00:00:00',
                'end_date' => '2021-10-05 00:00:00',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Updated the Link')]);

        Event::assertDispatched(LinkUpdated::class);
    }
}
