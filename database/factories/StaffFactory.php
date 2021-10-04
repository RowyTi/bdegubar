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
    public function definition()
    {
        return [
            'password' => $this->faker->password,
            'username' => $this->faker->userName,
            'state' => $this->faker->randomElement(["activo","inactivo"]),
            'branch_id' => Branch::factory(),
            'profile_id' => Profile::factory(),
        ];
    }
}
