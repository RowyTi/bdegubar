<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\Branch;
use App\Models\Customer;

class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'latitud' => $this->faker->word,
            'longitud' => $this->faker->word,
            'customer_id' => Customer::factory(),
            'address_id' => Address::factory(),
        ];
    }
}
