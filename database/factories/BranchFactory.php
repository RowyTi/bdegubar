<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\Branch;

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
    public function definition(): array
    {
        $name = $this->faker->name();
        $slug = Str::slug($name);
        return [
            'name'          => $name,
            'slug'          => $slug,
            'logo'          => $this->faker->imageUrl(30,30, 'abstract'),
            'latitud'       => $this->faker->latitude(),
            'longitud'      => $this->faker->longitude(),
            'state'         => $this->faker->randomElement(["activo","inactivo"]),
            'address_id'    => Address::factory(),
            'deletedAt'     => null,

        ];
    }
}
