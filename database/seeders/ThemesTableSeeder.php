<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'phone' => '555-555-5555',
            'title' => 'First Theme',
            'job_title' => 'First Theme',
            'github_url' => 'www.example.com',
            'facebook_url' => 'www.example.com',
            'instagram_url' => 'www.example.com',
            'twitter_url' => 'www.example.com',
            'youtube_url' => 'www.example.com',
            'tiktok_url' => 'www.example.com',
            'description' => 'This is the first theme',
            'page_content' => '<h1>Theme 1</h1>',
            'is_active' => true,
            'primary_color' => '#FDB716',
            'secondary_color' => '#0099cc',
            'background_color' => '#004C4C',
        ]);

        Theme::create([
            'first_name' => 'Second',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'phone' => '555-555-5555',
            'title' => 'Second Theme',
            'job_title' => 'First Theme',
            'github_url' => 'www.example.com',
            'facebook_url' => 'www.example.com',
            'instagram_url' => 'www.example.com',
            'twitter_url' => 'www.example.com',
            'youtube_url' => 'www.example.com',
            'tiktok_url' => 'www.example.com',
            'description' => 'This is the Second theme',
            'page_content' => '<h1>Theme 2</h1>',
            'is_active' => false,
            'primary_color' => '#FDB716',
            'secondary_color' => '#0099cc',
            'background_color' => '#004C4C',
        ]);

        Theme::create([
            'first_name' => 'Third',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'phone' => '555-555-5555',
            'title' => 'Third Theme',
            'job_title' => 'First Theme',
            'github_url' => 'www.example.com',
            'facebook_url' => 'www.example.com',
            'instagram_url' => 'www.example.com',
            'twitter_url' => 'www.example.com',
            'youtube_url' => 'www.example.com',
            'tiktok_url' => 'www.example.com',
            'description' => 'This is the third theme',
            'page_content' => '<h1>Theme 3</h1>',
            'is_active' => false,
            'primary_color' => '#FDB716',
            'secondary_color' => '#0099cc',
            'background_color' => '#004C4C',
        ]);
    }
}
