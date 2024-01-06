<?php

namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    protected $articleRepository;

    public function __construct(UserRepository $userRepository,
                                ArticleRepository $articleRepository)
    {
        $this->userRepository = $userRepository;
        $this->articleRepository = $articleRepository;
    }

    public function signUp($data)
    {
        return $this->userRepository->create($data);
    }

    public function signIn($data)
    {
        $user = $this->userRepository->findByEmail($data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return ['success' => false, 'message' => 'Invalid credentials'];
        }
        $token = $user->createToken('authToken')->plainTextToken;
        return ['success' => true, 'token' => $token];
    }
}
