<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    protected $commentRepository;
    protected $articleRepository;

    public function __construct(CommentRepository $commentRepository,
                                 ArticleRepository $articleRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->articleRepository = $articleRepository;
    }

    public function create($article_id, $comment)
    {
        $article = $this->articleRepository->findById($article_id);
        if($article){
            $data =  [
                'user_id' => Auth::user()->id,
                'article_id' => $article_id,
                'comment' => $comment
            ];
            return $this->commentRepository->create($data);
        }else{
            return 'Article doesnt exist';
        }
    }
}
