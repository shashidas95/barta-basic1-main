<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Clear existing data from the comments table
        // DB::table('comments')->truncate();

        // Use the factory to create 10 fake records
        for ($i = 0; $i < 10; $i++) {
            $userId = DB::table('users')->inRandomOrder()->value('id');
            $postId = DB::table('posts')->inRandomOrder()->value('id');
            DB::table('comments')->insert($this->getCommentData($userId, $postId));
        }
    }

    private function getCommentData($userId, $postId)
    {
        return [
            'user_id' => $userId,
            'post_id' => $postId,
            'comment_content' => fake()->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
