<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('index', ResourseController::class);
Route::resource('user', UserController::class);
Route::resource('news', NewsController::class);
Route::get('/test', [HomeController::class, 'testCreate'])->name('ytrty');

//Route::post('/create', [ResourseController::class, 'create']);
//Route::post('/edit/{id}', [ResourseController::class, 'edit']);
