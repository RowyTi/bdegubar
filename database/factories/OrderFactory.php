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
        $quantity = $this->faker->numberBetween(1,5);
        $unit_price = $this->faker->numberBetWeen(350,1200);
        $quantity1 = $this->faker->numberBetween(1,5);
        $unit_price1 = $this->faker->numberBetWeen(350,1200);
        $total = $unit_price*$quantity +  $unit_price1*$quantity1;
        return [
            'content' => [
                [
                    'id'            =>  '1',
                    'name'          =>  $this->faker->text(20),
                    'description'   =>  $this->faker->text(80),
                    'quantity'      =>  $quantity,
                    'unit_price'    =>  $unit_price,
                    'total_price'   =>  $unit_price*$quantity
                ],
                [
                    'id'            =>  '2',
                    'name'          =>  $this->faker->text(20),
                    'description'   =>  $this->faker->text(80),
                    'quantity'      =>  $quantity1,
                    'unit_price'    =>  $unit_price1,
                    'total_price'   =>  $unit_price1*$quantity1
                ]
            ],
            'take_away' => $this->faker->boolean,
            'payment_method' => $this->faker->randomElement(["1","2"]),
            'state' => $this->faker->randomElement(["entregado","anulado"]),
            'total' => $total,
            'branch_id' => Branch::all()->random()->id,
            'user_id'   => User::all()->random()->id,
             'created_at'=> $date,
            'updated_at' => $date
//            'user_id' => User::factory(),
//            'branch_id' => Branch::factory(),
        ];
    }
}
