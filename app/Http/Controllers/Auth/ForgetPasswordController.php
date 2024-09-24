<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgetPasswordRequest;
use App\Notifications\ResetPasswordVerificationNotification;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(ForgetPasswordRequest $request){
        $input = $request ->only ('email');
        $user = User::where(column: 'email', operator: $input)->first();

        $user->notify(instance: new ResetPasswordVerificationNotification());

        return $this->success([
            'message' => 'Reset password email has been sent successfully!'
        ]);

    }


}
