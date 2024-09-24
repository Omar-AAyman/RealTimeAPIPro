<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\EmailVerificationRequest;
use App\Notifications\EmailVerificationNotification;

class EmailVerificationController extends Controller
{
    private  $otp;

    public function __construct(Otp $otp)
    {
        $this->otp =  $otp;
    }


    public function resendEmailVerification(Request $request)
    {
        $request->user()->notify(instance: new EmailVerificationNotification());

        return $this->success([
            'message' => 'Verification code has been resent successfully!'
        ]);
    }


    public function emailVerification(EmailVerificationRequest $request)
    {
        $otp = $this->otp->validate($request->email, $request->otp);
        // $otp = $this->otp->validate($request->email, $request->otp);


        $user = User::where('email', operator: $request->email)->first();
        $user->update(['email_verified_at' => now()]);
        return $this->success([
            'message' => 'This account is verified now!'
        ]);
    }
}
