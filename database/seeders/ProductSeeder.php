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
            ],
            [
                'name'          => 'Bastoncitos de mozzarella',
            ],
            [
                'name'          => 'Snack con cheddar',
            ],
            [
                'name'          => 'Rabas',
            ],
            [
                'name'          => 'Sorrentinos',
            ],
            [
                'name'          => 'Ravioles',
            ],
            [
                'name'          => 'Salsa',
            ],
            [
                'name'          => 'Entraña',
            ],
            [
                'name'          => 'Tira de asado',
            ],
            [
                'name'          => 'Bife de chorizo',
            ],
            [
                'name'          => 'Ojo de bife',
            ],
            [
                'name'          => 'Costillita de cerdo',
            ],
            [
                'name'          => 'Pata Muslo',
            ],
            [
                'name'          => 'Simple con queso'
            ],
            [
                'name'          => 'Cuarto de libra'
            ],
            [
                'name'          => 'Triple xl'
            ],
            [
                'name'          => 'La asesina'
            ],
            [
                'name'          => 'Coca cola'
            ],
            [
                'name'          => 'Coca cola zero'
            ],
            [
                'name'          => 'Agua sin gas'
            ],
            [
                'name'          => 'Agua con gas'
            ],
            [
                'name'          => 'Jugo'
            ],
            [
                'name'          => 'Cerveza Quilmes'
            ],
            [
                'name'          => 'Cerveza Tirada'
            ],
            [
                'name'          => 'Vino Blanco'
            ],
            [
                'name'          => 'Vino Tinto'
            ],
        ];
        foreach ($products as $product){
            Product::factory()->create($product);
        }
    }
}
