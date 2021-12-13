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
                'name'        =>    'Cervelar Palermo Hollywood',
                'slug'        =>    Str::slug('Cervelar Palermo Hollywood'),
                'state'       =>    'activo',
            ],
            [
                'name'        =>    'Cervelar Villa Urquiza',
                'slug'        =>    Str::slug('Cervelar Villa Urquiza'),
                'state'       =>    'activo',
            ],
            [
                'name'        => 'Antares Palermo',
                'slug'        => Str::slug('Antares Palermo'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Belgrano R',
                'slug'        => Str::slug('Antares Belgrano R'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'La Esquina San Telmo',
                'slug'        => Str::slug('La esquina San Telmo'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Cervelar Palermo Hollywood Gorriti ',
                'slug'        => Str::slug('Cervelar Palermo Hollywood Gorriti'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Palermo Hollywood',
                'slug'        => Str::slug('Antares Palermo Hollywood'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Belgrano',
                'slug'        => Str::slug('Antares Belgrano'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'La Esquina Palermo Soho',
                'slug'        => Str::slug('La esquina Palermo Soho'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'La Esquina Palermo Hollywood',
                'slug'        => Str::slug('La esquina Palermo Hollywood'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Palermo Soho',
                'slug'        => Str::slug('Antares Palermo Soho'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Cervelar Palermo Soho',
                'slug'        => Str::slug('Cervelar Palermo Soho'),
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Plaza Serrano',
                'slug'        => Str::slug('Antares Plaza Serrano'),
                'state'       =>  'activo',
            ],
        ];

        foreach ($branches as $branch){
            Branch::factory()->create($branch);
        }
    }
}
