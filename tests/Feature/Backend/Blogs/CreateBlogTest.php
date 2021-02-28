<?php

namespace Tests\Feature\Backend\Blogs;

use App\Domains\Auth\Models\User;
use App\Events\Blog\BlogCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CreateBlogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_create_blogs()
    {
        $this->actingAs(User::factory()->user()->create());

        $response = $this->get('/admin/blogs/create');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_create_blogs_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/blogs/create');

        $response->assertOk();
    }

    /** @test */
    public function admin_can_create_new_blog()
    {
        Event::fake();

        $this->loginAsAdmin();

        $response = $this->post('/admin/blogs', [
            'title' => "Fake Title",
            'short_description' => 'Fake Short Description',
            'description' => 'Fake Description',
            'tags' => 'Fake, Test, Not Real, Nope',
            'page_content' => '<h1>Fake Page Content</h1>',
            'external_url' => 'https://www.example.com',
            'started_at' => '10/05/1994',
            'finished_at' => '10/05/2020',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'blogs',
            [
                'title' => "Fake Title",
                'short_description' => 'Fake Short Description',
                'description' => 'Fake Description',
                'tags' => 'Fake, Test, Not Real, Nope',
                'page_content' => '<h1>Fake Page Content</h1>',
                'external_url' => 'https://www.example.com',
                'started_at' => '10/05/1994',
                'finished_at' => '10/05/2020',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Created the Blog')]);

        Event::assertDispatched(BlogCreated::class);
    }
}
