<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', [UserController::class, 'list'])
    ->middleware('auth:sanctum')
    ->name('users.list');

Route::post('/auth/login', [ApiLoginController::class, 'login'])->name('api.login');


Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextoken];
})->name('token.create');
