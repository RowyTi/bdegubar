<?php

namespace Database\Seeders;

use App\Models\Address;
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
                'address_id'  =>     Address::factory()->create([
                    'latitude'     =>    '-34.583316129857636',
                    'longitude'    =>    '-58.43731744657959'
                ])
            ],
            [
                'name'        =>    'Cervelar Villa Urquiza',
                'slug'        =>    Str::slug('Cervelar Villa Urquiza'),
                'state'       =>    'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>    '-34.569461604222646',
                    'longitude'    =>    '-58.50265612626686',
                ])
            ],
            [
                'name'        => 'Antares Palermo',
                'slug'        => Str::slug('Antares Palermo'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.57755953001705',
                    'longitude'    =>  '-58.438818813032',
                ])
            ],
            [
                'name'        => 'Antares Belgrano R',
                'slug'        => Str::slug('Antares Belgrano R'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.56328603069303',
                    'longitude'    =>  '-58.458453323107555',
                ])
            ],
            [
                'name'        => 'La Esquina San Telmo',
                'slug'        => Str::slug('La esquina San Telmo'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.615432672727586',
                    'longitude'    =>  '-58.37751498451784',
                ])
            ],
            [
                'name'        => 'Cervelar Palermo Hollywood Gorriti ',
                'slug'        => Str::slug('Cervelar Palermo Hollywood Gorriti'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.58255005059808',
                    'longitude'    =>  '-58.44039937443088',
                ])
            ],
            [
                'name'        => 'Antares Palermo Hollywood',
                'slug'        => Str::slug('Antares Palermo Hollywood'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.58215587048157',
                    'longitude'    =>  '-58.44094386122719',
                ])
            ],
            [
                'name'        => 'Antares Belgrano',
                'slug'        => Str::slug('Antares Belgrano'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.56316233790357',
                    'longitude'    =>  '-58.451543951132194',
                ])
            ],
            [
                'name'        => 'La Esquina Palermo Soho',
                'slug'        => Str::slug('La esquina Palermo Soho'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.58754394274141',
                    'longitude'    =>  '-58.4339486604632',
                ])
            ],
            [
                'name'        => 'La Esquina Palermo Hollywood',
                'slug'        => Str::slug('La esquina Palermo Hollywood'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.57962953904583',
                    'longitude'    =>  '-58.442016744886274',
                ])
            ],
            [
                'name'        => 'Antares Palermo Soho',
                'slug'        => Str::slug('Antares Palermo Soho'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.5857774001171',
                    'longitude'    =>  '-58.427940512488576',
                ])
            ],
            [
                'name'        => 'Cervelar Palermo Soho',
                'slug'        => Str::slug('Cervelar Palermo Soho'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.588550855232846',
                    'longitude'    =>  '-58.42935671879689',
                ])
            ],
            [
                'name'        => 'Antares Plaza Serrano',
                'slug'        => Str::slug('Antares Plaza Serrano'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.58846253006389',
                    'longitude'    =>  '-58.43064417907717',
                ])
            ],
        ];

        foreach ($branches as $branch){
            Branch::factory()->create($branch);
        }
    }
}
