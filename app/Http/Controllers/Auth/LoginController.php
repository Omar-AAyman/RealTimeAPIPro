<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Notifications\LoginNotification;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {

        $request->validated($request->all());

        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('', 'Credentials do not match', 401);
        }
        $user = User::where(column: 'email', operator: $request->email)->first();

        try{
            $user->notify(instance: new LoginNotification());
        }catch(\Exception $e){};

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->first_name)->plainTextToken,
        ]);
    }
}

