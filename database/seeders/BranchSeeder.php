<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name'        => 'Sucursal Palermo Hollywood',
                'slug'        => Str::slug('Cervelar Sucursal Palermo Hollywood'),
                'customer_id' => 1
            ],
            [
                'name'        => 'Sucursal Villa Urquiza',
                'slug'        => Str::slug('Cervelar Sucursal Villa Urquiza'),
                'customer_id' => 1
            ],
            [
                'name'        => 'Sucursal Palermo',
                'slug'        => Str::slug('Antares Sucursal Palermo'),
                'customer_id' => 2
            ],
            [
                'name'        => 'Sucursal Belgrano R',
                'slug'        => Str::slug('Antares Sucursal Belgrano R'),
                'customer_id' => 2
            ],
            [
                'name'        => 'Sucursal San Telmo',
                'slug'        => Str::slug('La esquina Sucursal San Telmo'),
                'customer_id' => 3
            ]
        ];

        foreach ($branches as $branch){
            Branch::factory()->create($branch);
        }
    }
}
