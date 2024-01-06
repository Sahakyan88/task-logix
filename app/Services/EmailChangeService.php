<?php

namespace App\Services;

use App\Mail\VerificationEmail;
use App\Repositories\EmailChangeRepository;
use Illuminate\Support\Facades\Mail;

class EmailChangeService
{

    protected $emailChangeRepository;

    public function __construct(EmailChangeRepository $emailChangeRepository)
    {
        $this->emailChangeRepository = $emailChangeRepository;
    }

    public function create($request)
    {
        $email = $request->input('new_email');
        $user = auth()->user();
        $verificationCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        Mail::to($user->email)->send(new VerificationEmail($verificationCode));

        return $this->emailChangeRepository->create($user, $verificationCode, $email);
    }

    public function findId($id)
    {
        return $this->emailChangeRepository->findId($id);
    }

    public function findEmailId($email_id)
    {
        return $this->emailChangeRepository->findEmailId($email_id);

    }

    public function createEmail($emailChange)
    {

        return $this->emailChangeRepository->createEmail($emailChange);

    }

    public function delete($emailChange)
    {

        return $this->emailChangeRepository->delete($emailChange);

    }
}
