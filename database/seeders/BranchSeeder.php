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
                'name'        => 'Cervelar Palermo Hollywood',
                'slug'        => Str::slug('Cervelar Palermo Hollywood'),
                'customer_id' => 1
            ],
            [
                'name'        => 'Cervelar Villa Urquiza',
                'slug'        => Str::slug('Cervelar Villa Urquiza'),
                'customer_id' => 1
            ],
            [
                'name'        => 'Antares Palermo',
                'slug'        => Str::slug('Antares Palermo'),
                'customer_id' => 2
            ],
            [
                'name'        => 'Antares Belgrano R',
                'slug'        => Str::slug('Antares Belgrano R'),
                'customer_id' => 2
            ],
            [
                'name'        => 'La Esquina San Telmo',
                'slug'        => Str::slug('La esquina San Telmo'),
                'customer_id' => 3
            ]
        ];

        foreach ($branches as $branch){
            Branch::factory()->create($branch);
        }
    }
}
