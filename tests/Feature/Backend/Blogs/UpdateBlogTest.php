<?php

namespace Tests\Feature\Backend\Blogs;

use App\Domains\Auth\Models\User;
use App\Events\Blog\BlogCreated;
use App\Events\Blog\BlogUpdated;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class UpdateBlogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_update_blogs()
    {
        $this->actingAs(User::factory()->user()->create());

        $blog = Blog::factory()->create();

        $response = $this->get(route('admin.blogs.edit', $blog));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_edit_blogs_page()
    {
        $this->loginAsAdmin();

        $blog = Blog::factory()->create();

        $response = $this->get(route('admin.blogs.edit', $blog));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_update_blog()
    {
        Event::fake();

        $this->loginAsAdmin();

        $blog = Blog::factory()->create();

        $response = $this->patch(route('admin.blogs.update', $blog), [
            'title' => "Fake Title Update",
            'short_description' => 'Fake Short Description Update',
            'description' => 'Fake Description Update',
            'tags' => 'Fake, Test, Not Real, Nope, Update',
            'page_content' => '<h1>Fake Page Content Update</h1>',
            'external_url' => 'https://www.example.com/update',
            'started_at' => '10/05/1995',
            'finished_at' => '10/05/2021',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'blogs',
            [
                'title' => "Fake Title Update",
                'short_description' => 'Fake Short Description Update',
                'description' => 'Fake Description Update',
                'tags' => 'Fake, Test, Not Real, Nope, Update',
                'page_content' => '<h1>Fake Page Content Update</h1>',
                'external_url' => 'https://www.example.com/update',
                'started_at' => '10/05/1995',
                'finished_at' => '10/05/2021',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Updated the Blog')]);

        Event::assertDispatched(BlogUpdated::class);
    }
}
