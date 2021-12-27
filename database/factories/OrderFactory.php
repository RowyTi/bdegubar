<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Order;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-11 month', '-1 days')->format('Y-m-d H:i:s');
        return [
            'content' =>'{"id":"1","name":"pizza","description":"pizza grand con muzzarella","quantity":"1","unit_price":"500","total_price":"500"}',
//            [{"id":"1","name":"pizza","description":"pizza grand con muzzarella","quantity":"1","unit_price":"750","total_price":"750"}, {"id":"2","name":"Patagonia IPA","description":"Cerveza Patagonia IPA tirada","quantity":"1","unit_price":"350","total_price":"350"}]',
            'take_away' => $this->faker->boolean,
            'payment_method' => $this->faker->randomElement(["1","2"]),
            'state' => $this->faker->randomElement(["entregado","anulado"]),
            'total' => "1100",
            'branch_id' => Branch::all()->random()->id,
            'user_id'   => User::all()->random()->id,
             'created_at'=> $date,
            'updated_at' => $date
//            'user_id' => User::factory(),
//            'branch_id' => Branch::factory(),
        ];
    }
}
