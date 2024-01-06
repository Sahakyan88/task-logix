<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Services\CommentService;
use App\Services\LikeService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;
    /**
     * @var LikeService
     */
    protected $likeService;
    /**
     * @var CommentService
     */
    protected $commentService;

    /**
     * @param UserService $userService
     * @param LikeService $likeService
     * @param CommentService $commentService
     */
    public function __construct(UserService $userService, LikeService $likeService, CommentService $commentService)
    {
        $this->userService = $userService;
        $this->likeService = $likeService;
        $this->commentService = $commentService;
    }

    public function signUp(SignUpRequest $request)
    {
        try {
            $user = $this->userService->signUp($request->all());
            return response()->json(['user' => $user], 201);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function signIn(SignInRequest $request)
    {
        try {
            $data = $request->only('email', 'password');
            $user = $this->userService->signIn($data);
            return response()->json(['user' => $user], 201);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function toggleLike(Request $request)
    {
        try {
            $article_id = $request->get('article_id');
            $result = $this->likeService->toggleLike($article_id);
            return response()->json(['result' => $result]);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function userComment(Request $request)
    {
        try {
            $article_id = $request->get('article_id');
            $text = $request->get('comment');
            $comment = $this->commentService->create($article_id, $text);
            return response()->json(['result' => $comment]);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
