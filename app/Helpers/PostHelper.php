<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

function incrementPostViews($postId)
{
    // DB::table('posts')->where('id', $postId)->increment('views');
   return DB::table('posts')->where('id', 2)->increment('views');
}
