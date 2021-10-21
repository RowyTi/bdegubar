<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SocialNetwork;
use App\Models\User;

class SocialNetworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialNetwork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'social_id'     => $this->faker->uuid(),
            'social_avatar' => $this->faker->imageUrl(200,200, 'people'),
            'social_name'   => $this->faker->randomElement(['facebook', 'google']),
            'user_id'       => User::all()->random()->id,
        ];
    }
}
