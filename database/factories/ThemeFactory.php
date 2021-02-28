<?php

namespace Database\Factories;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'description' => $this->faker->text(100),
            'page_content' => $this->faker->randomHtml(),
            'email' => $this->faker->email,
            'github_url' => $this->faker->url,
            'facebook_url' => $this->faker->url,
            'instagram_url' => $this->faker->url,
            'twitter_url' => $this->faker->url,
            'youtube_url' => $this->faker->url,
            'tiktok_url' => $this->faker->url,
            'phone' => $this->faker->phoneNumber,
            'primary_color' => $this->faker->hexColor,
            'secondary_color' => $this->faker->hexColor,
            'background_color' => $this->faker->hexColor,
            'is_maintenance_mode' => '1',
            'contact_active' => '1',
            'resume_active' => '1',
            'background_video_active' => '1',
            'is_active' => '1',
        ];
    }
}
