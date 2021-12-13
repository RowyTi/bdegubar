<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            [
                'latitude'     =>    '-34.583316129857636',
                'longitude'    =>    '-58.43731744657959',
            ],
            [
                'latitude'     =>    '-34.569461604222646',
                'longitude'    =>    '-58.50265612626686',
            ],
            [
                'latitude'     =>  '-34.57755953001705',
                'longitude'    =>  '-58.438818813032',
            ],
            [
                'latitude'     =>  '-34.56328603069303',
                'longitude'    =>  '-58.458453323107555',
            ],
            [
                'latitude'     =>  '-34.615432672727586',
                'longitude'    =>  '-58.37751498451784',
            ],
            [
                'latitude'     =>  '-34.58255005059808',
                'longitude'    =>  '-58.44039937443088',
            ],
            [
                'latitude'     =>  '-34.58215587048157',
                'longitude'    =>  '-58.44094386122719',
            ],
            [
                'latitude'     =>  '-34.56316233790357',
                'longitude'    =>  '-58.451543951132194',
            ],
            [
                'latitude'     =>  '-34.58754394274141',
                'longitude'    =>  '-58.4339486604632',
            ],
            [
                'latitude'     =>  '-34.57962953904583',
                'longitude'    =>  '-58.442016744886274',
            ],
            [
                'latitude'     =>  '-34.5857774001171',
                'longitude'    =>  '-58.427940512488576',
            ],
            [
                'latitude'     =>  '-34.588550855232846',
                'longitude'    =>  '-58.42935671879689',
            ],
            [
                'latitude'     =>  '-34.58846253006389',
                'longitude'    =>  '-58.43064417907717',
            ],
        ];

        foreach ($addresses as $address){
            Address::factory()->create($address);
        }
    }
}
