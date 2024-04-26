<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', [UserController::class, 'list'])->name('users.list');
