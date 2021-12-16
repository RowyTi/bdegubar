<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('logos');
        Storage::disk('public')->deleteDirectory('mesas');
        Storage::disk('public')->deleteDirectory('productos');
        Storage::disk('public')->deleteDirectory('avatar');
        Storage::disk('public')->makeDirectory('logos');
        Storage::disk('public')->makeDirectory('mesas');
        Storage::disk('public')->makeDirectory('productos');
        Storage::disk('public')->makeDirectory('avatar');
        $this->call([
            RoleSeeder::class,
            BranchSeeder::class,
            CategorySeeder::class,
            StaffSeeder::class,
            UserSeeder::class,
            CommentSeeder::class
        ]);

    }
}
