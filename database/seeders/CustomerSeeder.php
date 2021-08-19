<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'Cervelar',
                'slug' => Str::slug('cervelar'),
            ],
            [
                'name' => 'Antares',
                'slug' => Str::slug('antares')
            ],
            [
                'name' => 'La Esquina',
                'slug' => Str::slug('La Esquina')
            ]
        ];

        foreach ($customers as $customer){
            Customer::factory()->create($customer);
        }
    }
}
