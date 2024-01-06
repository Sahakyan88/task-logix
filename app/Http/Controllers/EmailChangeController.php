<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmEmailChangeRequest;
use App\Http\Requests\EmailChangeRequest;
use App\Services\EmailChangeService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Exception;

class EmailChangeController extends Controller
{
    /**
     * @var EmailChangeService
     */
    protected $emailChangeService;

    /**
     * @param EmailChangeService $emailChangeService
     */
    public function __construct(EmailChangeService $emailChangeService)
    {
        $this->emailChangeService = $emailChangeService;
    }

    public function showForm()
    {
        return view('email.change.form');
    }

    public function initiate(EmailChangeRequest $request)
    {
        try {
            $emailChange = $this->emailChangeService->create($request);
            return redirect()->route('email-change-confirm', $emailChange->id);
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function showConfirmationForm($id)
    {
        try {
            $emailChange = $this->emailChangeService->findById($id);
            return view('email.change.confirmation', compact('emailChange'));
        } catch (Exception $e) {
            return response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function confirm(ConfirmEmailChangeRequest $request)
    {
        try {
            return $this->emailChangeService->confirmEmailChange($request);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
