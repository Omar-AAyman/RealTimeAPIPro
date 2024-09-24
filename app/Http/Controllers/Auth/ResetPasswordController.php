<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Ichtrojan\Otp\Otp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    private  $otp;

    public function __construct(Otp $otp)
    {
        $this->otp =  $otp;
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $otp = $this->otp->validate($request->email, $request->otp);

        $user = User::where('email', operator: $request->email)->first();

        $user->update(['password' => Hash::make($request['password'])]);
        $user->tokens()->delete();


        return $this->success([
            'message' => 'Your password has been updated successfully!'
        ]);
    }
}
