<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{


    protected $model = null;

    public function definition()
    {
        return [
            'user_id' => function () {
                return DB::table('users')->inRandomOrder()->value('id');
            },
            'post_content' => fake()->paragraph,
            'photo_path' => fake()->imageUrl(),
            'post_views' => fake()->randomNumber(),
            'likes' => fake()->randomNumber(),
            'unlikes' => fake()->randomNumber(),
            'comments' => fake()->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
