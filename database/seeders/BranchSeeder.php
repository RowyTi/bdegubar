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
                'latitud'     =>    '-34.583316129857636',
                'longitud'    =>    '-58.43731744657959',
                'state'       =>    'activo',
            ],
            [
                'name'        =>    'Cervelar Villa Urquiza',
                'slug'        =>    Str::slug('Cervelar Villa Urquiza'),
                'latitud'     =>  '-34.569461604222646',
                'longitud'    =>  '-58.50265612626686',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Palermo',
                'slug'        => Str::slug('Antares Palermo'),
                'latitud'     =>  '-34.57755953001705',
                'longitud'    =>  '-58.438818813032',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Belgrano R',
                'slug'        => Str::slug('Antares Belgrano R'),
                'latitud'     =>  '-34.56328603069303',
                'longitud'    =>  '-58.458453323107555',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'La Esquina San Telmo',
                'slug'        => Str::slug('La esquina San Telmo'),
                'latitud'     =>  '-34.615432672727586',
                'longitud'    =>  '-58.37751498451784',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Cervelar Palermo Hollywood Gorriti ',
                'slug'        => Str::slug('Cervelar Palermo Hollywood Gorriti'),
                'latitud'     =>  '-34.58255005059808',
                'longitud'    =>  '-58.44039937443088',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Palermo Hollywood',
                'slug'        => Str::slug('Antares Palermo Hollywood'),
                'latitud'     =>  '-34.58215587048157',
                'longitud'    =>  '-58.44094386122719',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Belgrano',
                'slug'        => Str::slug('Antares Belgrano'),
                'latitud'     =>  '-34.56316233790357',
                'longitud'    =>  '-58.451543951132194',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'La Esquina Palermo Soho',
                'slug'        => Str::slug('La esquina Palermo Soho'),
                'latitud'     =>  '-34.58754394274141',
                'longitud'    =>  '-58.4339486604632',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'La Esquina Palermo Hollywood',
                'slug'        => Str::slug('La esquina Palermo Hollywood'),
                'latitud'     =>  '-34.57962953904583',
                'longitud'    =>  '-58.442016744886274',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Palermo Soho',
                'slug'        => Str::slug('Antares Palermo Soho'),
                'latitud'     =>  '-34.5857774001171',
                'longitud'    =>  '-58.427940512488576',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Cervelar Palermo Soho',
                'slug'        => Str::slug('Cervelar Palermo Soho'),
                'latitud'     =>  '-34.588550855232846',
                'longitud'    =>  '-58.42935671879689',
                'state'       =>  'activo',
            ],
            [
                'name'        => 'Antares Plaza Serrano',
                'slug'        => Str::slug('Antares Plaza Serrano'),
                'latitud'     =>  '-34.58846253006389',
                'longitud'    =>  '-58.43064417907717',
                'state'       =>  'activo',
            ],
        ];

        foreach ($branches as $branch){
            Branch::factory()->create($branch);
        }
    }
}
