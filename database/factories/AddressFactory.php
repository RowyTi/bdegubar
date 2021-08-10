<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetName(),
            'number' => $this->faker->numberBetween(1, 1000),
            'piso' => $this->faker->numberBetween(1, 20),
            'dpto' => $this->faker->randomLetter(),
            'cp' => $this->faker->postcode(),
        ];
    }
}
