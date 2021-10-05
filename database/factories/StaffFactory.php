<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Profile;
use App\Models\Staff;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'password' => $this->faker->password,
            'username' => $this->faker->userName,
            'state' => $this->faker->randomElement(["activo","inactivo"]),
            'branch_id' => Branch::all()->random()->id,
            'profile_id' => Profile::all()->random()->id,
        ];
    }
}
