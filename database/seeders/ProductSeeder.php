<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
            ->count(5)
            ->create([
                'category_id' => 1
            ]);
        Product::factory()
            ->count(3)
            ->create([
                'category_id' => 2
            ]);
        Product::factory()
            ->count(7)
            ->create([
                'category_id' => 3
            ]);
    }
}
