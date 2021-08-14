<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->create([
                'name' => 'Bebidas'
            ]);
        Category::factory()
            ->create([
                'name' => 'Ensaladas'
            ]);
        Category::factory()
            ->create([
                'name' => 'Hamburguesas'
            ]);
    }
}
