<?php

namespace App\Repositories;

use App\Models\EmailChange;

class EmailChangeRepository
{
    public function create($user, $verificationCode, $email)
    {
        return EmailChange::create([
            'user_id' => $user->id,
            'new_email' => $email,
            'verification_code' => bcrypt($verificationCode),
            'expires_at' => now()->addMinutes(30),
        ]);
    }

    public function findId($id)
    {
        return EmailChange::findOrFail($id);
    }

    public function findEmailId($email_id)
    {
        return EmailChange::findOrFail($email_id);
    }

    public function createEmail($emailChange)
    {
        $user = $emailChange->user;
        $user->email = $emailChange->new_email;
        $user->save();

        return $user;
    }

    public function delete($emailChange)
    {
        return $emailChange->delete();
    }
}
