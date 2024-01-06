<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{
    public function create($data)
    {
        return Comment::create($data);
    }
}
