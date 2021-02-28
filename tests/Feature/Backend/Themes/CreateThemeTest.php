<?php

namespace Tests\Feature\Backend\Themes;

use App\Domains\Auth\Models\User;
use App\Events\Theme\ThemeCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CreateThemeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_create_themes()
    {
        $this->actingAs(User::factory()->user()->create());

        $response = $this->get('/admin/themes/create');

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_create_themes_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/themes/create');

        $response->assertOk();
    }

    /** @test */
    public function admin_can_create_new_theme()
    {
        Event::fake();

        $this->loginAsAdmin();

        $response = $this->post('/admin/themes', [
            'title' => "Fake Title",
            'first_name' => "Fake Title",
            'last_name' => "Fake Title",
            'description' => 'Fake Description',
            'page_content' => '<h1>Fake Page Content</h1>',
            'email' => 'admin@admin.com',
            'github_url' => 'https://www.example.com',
            'facebook_url' => 'https://www.example.com',
            'instagram_url' => 'https://www.example.com',
            'twitter_url' => 'https://www.example.com',
            'youtube_url' => 'https://www.example.com',
            'tiktok_url' => 'https://www.example.com',
            'phone' => '5555555555',
            'primary_color' => '#FFFFFF',
            'secondary_color' => '#FFFFFF',
            'background_color' => '#FFFFFF',
            'is_maintenance_mode' => '1',
            'contact_active' => '1',
            'resume_active' => '1',
            'background_video_active' => '1',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'themes',
            [
                'title' => "Fake Title",
                'first_name' => "Fake Title",
                'last_name' => "Fake Title",
                'description' => 'Fake Description',
                'page_content' => '<h1>Fake Page Content</h1>',
                'email' => 'admin@admin.com',
                'github_url' => 'https://www.example.com',
                'facebook_url' => 'https://www.example.com',
                'instagram_url' => 'https://www.example.com',
                'twitter_url' => 'https://www.example.com',
                'youtube_url' => 'https://www.example.com',
                'tiktok_url' => 'https://www.example.com',
                'phone' => '5555555555',
                'primary_color' => '#FFFFFF',
                'secondary_color' => '#FFFFFF',
                'background_color' => '#FFFFFF',
                'is_maintenance_mode' => '1',
                'contact_active' => '1',
                'resume_active' => '1',
                'background_video_active' => '1',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Created the Theme')]);

        Event::assertDispatched(ThemeCreated::class);
    }
}
