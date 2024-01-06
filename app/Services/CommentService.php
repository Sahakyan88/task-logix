<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{

    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function userComment($user_id, $article_id, $comment)
    {
        return $this->commentRepository->userComment($user_id, $article_id, $comment);
    }
}
