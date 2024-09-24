<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();

        $validatedData = $request->validated();

        $user->update($validatedData);
        $user = $user->refresh();

        return $this->success([
            'user' => $user,
            'message' => 'User data has been updated successfully!'
        ]);
    }
}
