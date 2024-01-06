<?php

namespace App\Services;

use App\Repositories\LikeRepository;

class LikeService
{
    protected $likeRepository;

    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function toggleLike($user_id, $article_id)
    {

        return $this->likeRepository->toggleLike($user_id, $article_id);
    }
}
