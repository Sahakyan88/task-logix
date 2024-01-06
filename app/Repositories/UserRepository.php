<?php

namespace App\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;


class UserRepository
{
    public function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }
    public function findById($id)
    {
        return User::where('id', $id)->first();
    }
}
