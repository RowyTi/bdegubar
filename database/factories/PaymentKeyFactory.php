<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\PaymentKey;

class PaymentKeyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentKey::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'access_token' => Str::random(30),
            'public_token' => Str::random(30),
            'customer_id' => Customer::all()->random()->id,
        ];
    }
}
