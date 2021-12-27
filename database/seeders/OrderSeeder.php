<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(2000)->create([
            'state' => 'entregado'
        ]);
        Order::factory(300)->create([
            'state' => 'anulado'
        ]);
    }
}
