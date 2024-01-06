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
    protected $likeService;
    protected $commentService;


    /**
     * @param UserService $userService
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
            $user_id = $request->get('user_id');
            $article_id = $request->get('article_id');
            $liked = $this->likeService->toggleLike($user_id, $article_id);
            return response()->json(['liked' => $liked]);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function userComment(Request $request)
    {
        try {
//            if (Auth::user()) {
            $user_id = $request->get('user_id');
            $article_id = $request->get('article_id');
            $comment = $request->get('comment');
            $comments = $this->commentService->userComment($user_id, $article_id, $comment);
            return response()->json(['comments' => $comments]);
//            } else {
//                return response()->json(['error' => 'error']);
//            }

        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
