<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        $name = env('ADMIN_FIRST_NAME', 'Admin') . ' ' . env('ADMIN_LAST_NAME', 'Istrator');

        // Add the master administrator, user id of 1
        User::create([
            'type' => User::TYPE_ADMIN,
            'name' => $name,
            'email' => env('ADMIN_EMAIL', 'admin@admin.com'),
            'password' => env('ADMIN_PASSWORD', 'secret'),
            'email_verified_at' => now(),
            'active' => true,
        ]);

        if (app()->environment(['local', 'testing'])) {
            User::create([
                'type' => User::TYPE_USER,
                'name' => 'Test User',
                'email' => 'user@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
                'active' => true,
            ]);
        }

        $this->enableForeignKeys();
    }
}
