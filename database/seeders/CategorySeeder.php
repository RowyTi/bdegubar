<?php

namespace Database\Seeders;

use App\Models\Branch;
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
       $cat = [
           [
               'name' => 'Entradas',
               'slug' => 'entradas'
           ],
           [
               'name' => 'Pastas',
               'slug' => 'pastas'
           ],
           [
               'name' => 'Carnes',
               'slug' => 'carnes'
           ],
           [
               'name' => 'Hamburguesas',
               'slug' => 'hamburguesas'
           ],
           [
               'name' => 'Bebidas sin alcohol',
               'slug' => 'bibidas-sin-alcohol'
           ],
           [
               'name' => 'Bebidas con alcohol',
               'slug' => 'bibidas-con-alcohol'
           ],
           [
               'name' => 'Tragos',
               'slug' => 'tragos'
           ]
       ];
        foreach ($cat as $c){
            Category::factory()->create($c);
        }

        $categories = Category::all();

        Branch::all()->each(function ($branch) use ($categories) {
            $branch->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
