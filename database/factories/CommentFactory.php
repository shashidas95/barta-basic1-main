<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return DB::table('users')->inRandomOrder()->value('id');
            },
            'post_id' => function () {
                return DB::table('posts')->inRandomOrder()->value('id');
            },
            'post_content' => fake()->paragraph,

        ];
    }
}
