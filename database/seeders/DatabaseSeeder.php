<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CustomerSeeder::class,
            PaymentkeySeeder::class,
            BranchSeeder::class,
            CategorySeeder::class,
            TableSeeder::class,
            ProductSeeder::class,
            ProfileSeeder::class,
            StaffSeeder::class,
            UserSeeder::class
            //SocialNetworkSeed::class,

        ]);
        // \App\Models\User::factory(10)->create();
        \App\Models\Comment::factory(100)->create();
    }
}
