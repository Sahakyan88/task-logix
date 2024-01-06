<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function userComment($user_id, $article_id, $comment)
    {
        return Comment::create(['user_id' => $user_id,
            'article_id' => $article_id,
            'comment' => $comment
        ]);

    }
}
