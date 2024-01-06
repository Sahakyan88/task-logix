<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\LikeRepository;
use Illuminate\Support\Facades\Auth;

class LikeService
{
    protected $likeRepository;
    protected $articleRepository;

    public function __construct(LikeRepository $likeRepository,
                                ArticleRepository $articleRepository)
    {
        $this->likeRepository = $likeRepository;
        $this->articleRepository = $articleRepository;
    }

    public function toggleLike($article_id)
    {
        $article = $this->articleRepository->findById($article_id);
        if($article){
            return $this->likeRepository->toggleLike(Auth::user()->id, $article_id);
        }else{
            return 'Article doesnt exist';
        }
    }
}
