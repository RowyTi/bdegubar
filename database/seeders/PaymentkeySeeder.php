<?php

namespace Database\Seeders;

use App\Models\PaymentKey;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaymentkeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment_keys = [
            [
               'name'           => 'mercado pago',
               'access_token'   => Str::random(32),
               'public_token'   => Str::random(32),
               'customer_id'    =>  '1'
            ],
            [
                'name'           => 'mercado pago',
                'access_token'   => Str::random(32),
                'public_token'   => Str::random(32),
                'customer_id'    =>  '2'
            ],
            [
                'name'           => 'mercado pago',
                'access_token'   => Str::random(32),
                'public_token'   => Str::random(32),
                'customer_id'    =>  '3'
            ],
        ];
        foreach ($payment_keys as $payment_key){
            PaymentKey::factory()->create($payment_key);
        }
    }
}
