<?php

namespace App\Repositories;

use App\Models\Like;

class LikeRepository
{
    public function toggleLike($user_id, $article_id)
    {
        $like = Like::where('user_id', $user_id)->where('article_id', $article_id)->first();

        if ($like) {
            $like->delete();
            return false;
        } else {
            Like::create(['user_id' => $user_id, 'article_id' => $article_id]);
            return true;
        }
    }
}
