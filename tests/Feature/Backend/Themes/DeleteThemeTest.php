<?php

namespace Tests\Feature\Backend\Themes;

use App\Domains\Auth\Models\User;
use App\Events\Theme\ThemeDeleted;
use App\Models\Theme;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class DeleteThemeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_delete_themes()
    {
        $this->actingAs(User::factory()->user()->create());

        $theme = Theme::factory()->create();

        $response = $this->delete(route('admin.themes.destroy', $theme));

        $response->assertSessionHas('flash_danger', __('You do not have access to do that.'));
    }

    /** @test */
    public function an_admin_can_delete_themes()
    {
        Event::fake();

        $this->loginAsAdmin();

        $theme = Theme::factory()->create();

        $response = $this->delete(route('admin.themes.destroy', $theme));

        $response->assertSessionHas(['flash_success' => __('The theme was successfully deleted.')]);

        $this->assertSoftDeleted('themes', ['id' => $theme->id]);

        Event::assertDispatched(ThemeDeleted::class);
    }
}
