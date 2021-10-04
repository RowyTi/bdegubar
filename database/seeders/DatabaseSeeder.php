<?php

namespace Database\Seeders;

use App\Models\Table;
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
            CustomerSeeder::class,
            BranchSeeder::class,
            CategorySeeder::class,
            TableSeeder::class,
            ProductSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
