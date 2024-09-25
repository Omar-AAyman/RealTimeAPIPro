<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Admin\RolesAndPermissionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('setapplang')->prefix('{locale}')->group(function () {
    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/login', [LoginController::class, 'login']);


    Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPassword']);
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword']);
});



Route::middleware(['auth:sanctum', 'setapplang'])->prefix('{locale}')->group(function () {
    Route::get('/profile', function (Request $request) {
        return $request->user();
    });

    Route::put('/profile', [ProfileController::class, 'update']);
    Route::post('/email-verification', [EmailVerificationController::class, 'emailVerification']);
    Route::get('/resend-email-verification', [EmailVerificationController::class, 'resendEmailVerification']);
    //     Route::post('/logout', [LogoutController::class, 'logout']);
});
Route::middleware(['auth:sanctum', 'setapplang'])->prefix('{locale}/admin')->group(function () {
    Route::resource('role-permission', RolesAndPermissionsController::class);
});
