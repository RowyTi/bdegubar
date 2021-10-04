<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'description' => $this->faker->text,
            'state' => $this->faker->randomElement(["activo","inactivo"]),
            'branch_id' => Branch::all()->random()->id,
        ];
    }
}
