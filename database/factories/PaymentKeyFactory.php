<?php

namespace Database\Factories;

use App\Models\Branch;
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
    public function definition(): array
    {
        return [
            'name'          => $this->faker->name(),
            'access_token'  => Str::random(30),
            'public_token'  => Str::random(30),
            'branch_id'     => Branch::all()->random()->id,
        ];
    }
}
