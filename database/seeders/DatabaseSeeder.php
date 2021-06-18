<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class, EventSeeder::class, PostSeeder::class, VolunteerSeeder::class]);
        // User::factory(10)->create();
    }
}
