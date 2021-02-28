<?php

namespace Tests\Feature\Backend\Blogs;

use App\Domains\Auth\Models\User;
use App\Events\Blog\BlogDeleted;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class DeleteBlogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_delete_blogs()
    {
        $this->actingAs(User::factory()->user()->create());

        $blog = Blog::factory()->create();

        $response = $this->delete(route('admin.blogs.destroy', $blog));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_delete_blogs()
    {
        Event::fake();

        $this->loginAsAdmin();

        $blog = Blog::factory()->create();

        $response = $this->delete(route('admin.blogs.destroy', $blog));

        $response->assertSessionHas(['flash_success' => __('The blog was successfully deleted.')]);

        $this->assertSoftDeleted('blogs', ['id' => $blog->id]);

        Event::assertDispatched(BlogDeleted::class);
    }
}
