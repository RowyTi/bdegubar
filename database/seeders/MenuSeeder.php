<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name'          => 'Menu principal',
                'customer_id'   => 1
            ],
            [
                'name'          => 'Menu',
                'customer_id'   => 2
            ],
        ];

        $categories = Category::all();

        foreach ($menus as $menu){
            Menu::factory()->hasAttached($categories)->create($menu);
        }
    }
}
