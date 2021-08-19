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
        $products = [
            [
                'name'          => 'Picada para 2',
                'category_id'   => 1
            ],
            [
                'name'          => 'Bastoncitos de mozzarella',
                'category_id'   => 1
            ],
            [
                'name'          => 'Snack con cheddar',
                'category_id'   => 1
            ],
            [
                'name'          => 'Rabas',
                'category_id'   => 1
            ],
            [
                'name'          => 'Sorrentinos',
                'category_id'   => 2
            ],
            [
                'name'          => 'Ravioles',
                'category_id'   => 2
            ],
            [
                'name'          => 'Salsa',
                'category_id'   => 2
            ],
            [
                'name'          => 'Entraña',
                'category_id'   => 3
            ],
            [
                'name'          => 'Tira de asado',
                'category_id'   => 3
            ],
            [
                'name'          => 'Bife de chorizo',
                'category_id'   => 3
            ],
            [
                'name'          => 'Ojo de bife',
                'category_id'   => 3
            ],
            [
                'name'          => 'Costillita de cerdo',
                'category_id'   => 3
            ],
            [
                'name'          => 'Pata Muslo',
                'category_id'   => 3
            ],
            [
                'name'          => 'Simple con queso',
                'category_id'   => 4
            ],
            [
                'name'          => 'Cuarto de libra',
                'category_id'   => 4
            ],
            [
                'name'          => 'Triple xl',
                'category_id'   => 4
            ],
            [
                'name'          => 'La asesina',
                'category_id'   => 4
            ],
            [
                'name'          => 'Coca cola',
                'category_id'   => 5
            ],
            [
                'name'          => 'Coca cola zero',
                'category_id'   => 5
            ],
            [
                'name'          => 'Agua sin gas',
                'category_id'   => 5
            ],
            [
                'name'          => 'Agua con gas',
                'category_id'   => 5
            ],
            [
                'name'          => 'Jugo',
                'category_id'   => 5
            ],
            [
                'name'          => 'Cerveza Quilmes',
                'category_id'   => 6
            ],
            [
                'name'          => 'Cerveza Tirada',
                'category_id'   => 6
            ],
            [
                'name'          => 'Vino Blanco',
                'category_id'   => 6
            ],
            [
                'name'          => 'Vino Tinto',
                'category_id'   => 6
            ],
        ];
        foreach ($products as $product){
            Product::factory()->create($product);
        }
    }
}
