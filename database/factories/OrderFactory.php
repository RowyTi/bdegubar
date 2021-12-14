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
        return [
            'content' => '{}',
            'take_away' => $this->faker->boolean,
            'payment_method' => $this->faker->randomElement(["1","2"]),
            'state' => $this->faker->randomElement(["1","2","3","4"]),
            'total' => $this->faker->randomFloat(0, 0, 9999999999.),
            'user_id' => User::factory(),
            'branch_id' => Branch::factory(),
        ];
    }
}
