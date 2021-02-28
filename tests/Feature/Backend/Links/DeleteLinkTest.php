<?php

namespace Tests\Feature\Backend\Links;

use App\Domains\Auth\Models\User;
use App\Events\Link\LinkDeleted;
use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class DeleteLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_delete_links()
    {
        $this->actingAs(User::factory()->user()->create());

        $link = Link::factory()->create();

        $response = $this->delete(route('admin.links.destroy', $link));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_delete_links()
    {
        Event::fake();

        $this->loginAsAdmin();

        $link = Link::factory()->create();

        $response = $this->delete(route('admin.links.destroy', $link));

        $response->assertSessionHas(['flash_success' => __('The link was successfully deleted.')]);

        $this->assertSoftDeleted('links', ['id' => $link->id]);

        Event::assertDispatched(LinkDeleted::class);
    }
}
