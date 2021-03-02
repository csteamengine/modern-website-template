<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        if (! App::environment('production')) {
            $this->call(AnnouncementSeeder::class);
            $this->call(ProjectsTableSeeder::class);
            $this->call(BlogsTableSeeder::class);
            $this->call(ThemesTableSeeder::class);
            $this->call(VisitsTableSeeder::class);
            $this->call(PositionsTableSeeder::class);
        }

        Model::reguard();
    }
}
