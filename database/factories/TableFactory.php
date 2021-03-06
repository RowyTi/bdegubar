<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Table;

class TableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Table::class;

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
            'name'      => $name,
            'slug'      => $slug,
            'qr'        => $this->faker->word(),
            'state'     => $this->faker->randomElement(["libre","ocupado","inactivo"]),
            'branch_id' => Branch::all()->random()->id,
        ];
    }
}
