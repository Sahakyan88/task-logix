<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Services\ArticleService;
use App\Services\TagService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;

class ArticleController extends Controller
{
    /**
     * @var ArticleService
     */
    protected $articleService;
    /**
     * @var TagService
     */
    protected $tagService;

    /**
     * @param ArticleService $articleService
     * @param TagService $tagService
     */
    public function __construct(ArticleService $articleService, TagService $tagService)
    {
        $this->articleService = $articleService;
        $this->tagService = $tagService;
    }
    public function article()
    {
        $tags = $this->tagService->getAll();
        return view('article', compact('tags'));
    }

    public function create(Request $request)
    {
        try {
            $article = $this->articleService->create($request->all());
            if ($request->tags) {
                foreach ($request->tags as $tag) {

                    $article->tags()->attach($tag);
                }
            }
            return response()->json(['article' => $article], 201);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getList($count)
    {
        try {
            $articles = $this->articleService->getList($count);
            return response()->json(['articles' => $articles], 201);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function search(Request $request)
    {
        try {
            $keyword = $request->input('keyword');
            $articles = $this->articleService->searchArticles($keyword);
            return response()->json(['articles' => $articles], 201);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
