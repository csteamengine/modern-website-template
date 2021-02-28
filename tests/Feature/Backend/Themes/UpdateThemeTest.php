<?php

namespace Tests\Feature\Backend\Themes;

use App\Domains\Auth\Models\User;
use App\Events\Theme\ThemeCreated;
use App\Events\Theme\ThemeUpdated;
use App\Models\Theme;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class UpdateThemeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_update_themes()
    {
        $this->actingAs(User::factory()->user()->create());

        $theme = Theme::factory()->create();

        $response = $this->get(route('admin.themes.edit', $theme));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_access_the_edit_themes_page()
    {
        $this->loginAsAdmin();

        $theme = Theme::factory()->create();

        $response = $this->get(route('admin.themes.edit', $theme));

        $response->assertOk();
    }

    /** @test */
    public function admin_can_update_theme()
    {
        Event::fake();

        $this->loginAsAdmin();

        $theme = Theme::factory()->create();

        $response = $this->patch(route('admin.themes.update', $theme), [
            'title' => "Fake Title Update",
            'first_name' => "Fake Name Update",
            'last_name' => "Fake Name Update",
            'description' => 'Fake Description Update',
            'page_content' => '<h1>Fake Page Content Update</h1>',
            'email' => 'update@admin.com',
            'github_url' => 'https://www.example.com/update',
            'facebook_url' => 'https://www.example.com/update',
            'instagram_url' => 'https://www.example.com/update',
            'twitter_url' => 'https://www.example.com/update',
            'youtube_url' => 'https://www.example.com/update',
            'tiktok_url' => 'https://www.example.com/update',
            'phone' => '5555555556',
            'primary_color' => '#FFFFFA',
            'secondary_color' => '#FFFFFA',
            'background_color' => '#FFFFFA',
            'is_maintenance_mode' => '0',
            'contact_active' => '1',
            'resume_active' => '1',
            'background_video_active' => '1',
            'is_active' => '1',
        ]);

        $this->assertDatabaseHas(
            'themes',
            [
                'title' => "Fake Title Update",
                'first_name' => "Fake Name Update",
                'last_name' => "Fake Name Update",
                'description' => 'Fake Description Update',
                'page_content' => '<h1>Fake Page Content Update</h1>',
                'email' => 'update@admin.com',
                'github_url' => 'https://www.example.com/update',
                'facebook_url' => 'https://www.example.com/update',
                'instagram_url' => 'https://www.example.com/update',
                'twitter_url' => 'https://www.example.com/update',
                'youtube_url' => 'https://www.example.com/update',
                'tiktok_url' => 'https://www.example.com/update',
                'phone' => '5555555556',
                'primary_color' => '#FFFFFA',
                'secondary_color' => '#FFFFFA',
                'background_color' => '#FFFFFA',
                'is_maintenance_mode' => '0',
                'contact_active' => '1',
                'resume_active' => '1',
                'background_video_active' => '1',
                'is_active' => '1',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('Successfully Updated the Theme')]);

        Event::assertDispatched(ThemeUpdated::class);
    }
}
