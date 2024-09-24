<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Notifications\EmailVerificationNotification;

class RegisterController extends Controller
{
    // use HttpResponses;

    public function register(RegistrationRequest $request)
    {

        $newUser = $request->validated();

        $newUser['password'] = Hash::make($newUser['password']);
        $newUser['role'] = 'user';
        $newUser['status'] = 'active';

        $user = User::create($newUser);

        $user->notify(new EmailVerificationNotification());
        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->first_name)->plainTextToken,
        ]);
    }
}
