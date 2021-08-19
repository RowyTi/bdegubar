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
       $categories = [
           [
               'name' => 'Entradas',
           ],
           [
               'name' => 'Pastas'
           ],
           [
               'name' => 'Carnes'
           ],
           [
               'name' => 'Hamburguesas'
           ],
           [
               'name' => 'Bebidas sin alcohol'
           ],
           [
               'name' => 'Bebidas con alcohol'
           ],
           [
               'name' => 'Tragos'
           ]
       ];
        foreach ($categories as $category){
            Category::factory()->create($category);
        }
    }
}
