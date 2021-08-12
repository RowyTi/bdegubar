<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;
use App\Models\Profile;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'secondName' => $this->faker->word,
            'lastName' => $this->faker->word,
            'avatar' => $this->faker->word,
            'dateOfBirth' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber,
            'address_id' => Address::factory(),
        ];
    }
}
