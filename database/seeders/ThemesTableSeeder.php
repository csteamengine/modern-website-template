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
            'title' => 'First Theme',
            'description' => 'This is the first theme',
            'page_content' => '<h1>Theme 1</h1>',
            'is_active' => true,
        ]);

        Theme::create([
            'first_name' => 'Second',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'title' => 'Second Theme',
            'description' => 'This is the Second theme',
            'page_content' => '<h1>Theme 2</h1>',
            'is_active' => true,
        ]);

        Theme::create([
            'first_name' => 'Third',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'title' => 'Third Theme',
            'description' => 'This is the third theme',
            'page_content' => '<h1>Theme 3</h1>',
            'is_active' => true,
        ]);
    }
}
