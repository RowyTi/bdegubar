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
    public function definition(): array
    {
        return [
            'street'    => $this->faker->streetName(),
            'number'    => $this->faker->buildingNumber(),
            'piso'      => $this->faker->randomNumber(1),
            'dpto'      => $this->faker->randomLetter(),
            'cp'        => $this->faker->postcode(),
            'latitude'   => $this->faker->latitude(),
            'longitude'  => $this->faker->longitude(),
        ];
    }
}
