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
                'name'        => 'Cervelar Palermo',
                'slug'        => Str::slug('Cervelar Palermo'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.58255005059808',
                    'longitude'    =>  '-58.44039937443088',
                ])
            ],
            [
                'name'        => 'La Esquina Palermo',
                'slug'        => Str::slug('La esquina Palermo'),
                'state'       =>  'activo',
                'address_id'  =>   Address::factory()->create([
                    'latitude'     =>  '-34.57962953904583',
                    'longitude'    =>  '-58.442016744886274',
                ])
            ],
        ];

        foreach ($branches as $branch){
            Branch::factory()->create($branch);
        }
    }
}
