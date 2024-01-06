<?php

namespace App\Services;

use App\Mail\VerificationEmail;
use App\Repositories\EmailChangeRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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

    public function confirmEmailChange($request)
    {
        $emailChange = $this->emailChangeRepository->findById($request->input('email_change_id'));

        if (password_verify($request->input('code'), $emailChange->verification_code)
            && now()->lt($emailChange->expires_at)) {

            $this->emailChangeRepository->createEmail($emailChange);
            $this->emailChangeRepository->delete($emailChange);

            Session::flash('success', 'Email changed successfully!');
            return redirect()->route('dashboard');
        }
        throw new \Exception('Invalid or expired verification code.');
    }

    public function findById($id)
    {
        return $this->emailChangeRepository->findById($id);
    }
}
