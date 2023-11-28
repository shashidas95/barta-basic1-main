<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Clear existing data from the posts table
        DB::table('posts')->truncate();

        // Use the factory to create 10 fake records
        for ($i = 0; $i < 10; $i++) {
            $userId = DB::table('users')->inRandomOrder()->value('id');
            DB::table('posts')->insert($this->getPostData($userId));
        }
    }

    private function getPostData($userId)
    {
        return [
            'user_id' => $userId,
            'content' => fake()->paragraph,
            'photo_path' => fake()->imageUrl(),
            'views' => fake()->randomNumber(),
            'likes' => fake()->randomNumber(),
            'unlikes' => fake()->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
