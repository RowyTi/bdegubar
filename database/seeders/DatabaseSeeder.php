<?php

namespace Database\Seeders;

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
            BranchSeeder::class,
            PaymentkeySeeder::class,
            CategorySeeder::class,
            TableSeeder::class,
            ProductSeeder::class,
            ProfileSeeder::class,
            StaffSeeder::class,
            UserSeeder::class,
            CommentSeeder::class,
            //SocialNetworkSeed::class,
        ]);

    }
}
