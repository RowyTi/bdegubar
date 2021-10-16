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
                'state'       =>  'activo',
            ],
            [
                'name' => 'Antares',
                'slug' => Str::slug('antares'),
                'state'       =>  'activo',
            ],
            [
                'name' => 'La Esquina',
                'slug' => Str::slug('La Esquina'),
                'state'       =>  'activo',
            ]
        ];

        foreach ($customers as $customer){
            Customer::factory()->create($customer);
        }
    }
}
