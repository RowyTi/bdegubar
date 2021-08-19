<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(),
            'email_verified_at' => $this->faker->dateTime(),
            'remember_token' => Str::random(10),
            'profile_id' => Profile::factory(),
        ];
    }
}
