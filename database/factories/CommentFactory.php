<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Branch;
use App\Models\Comment;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title'     => $this->faker->sentence(20),
            'message'   => $this->faker->word(),
            'rating'    => $this->faker->randomFloat(1, 3, 5.),
            'branch_id' => Branch::all()->random()->id,
            'user_id'   => User::all()->random()->id,
            // 'deleted_at'=> null,
        ];
    }
}
