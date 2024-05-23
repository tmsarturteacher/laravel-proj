<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ResourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// site.com/admin/dashboard
// site.com/admin/users

Route::prefix('admin')->group(function () {

//    Route::get('/dashboard', [DashboardController::class, 'testCreate'])
//        ->name('admin.dashboard');
//    Route::get('/users', [AdminUsersController::class, 'testCreate'])
//        ->name('admin.users');

});

// глобальный посредник (middleware)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'testCreate'])
        ->name('admin.dashboard');
});

// локальный посредник (middleware)
//Route::get('/users', [AdminUsersController::class, 'testCreate'])
//    ->name('admin.users')
//    ->prefix('admin')
//    ->middleware(['custom']);

// site.com/dashboard
Route::get('/dashboard', [HomeController::class, 'testCreate'])
    ->name('users.dashboard');

Route::get('/', function () {
    return view('index');
})->name('index');

// route('user.create');

Route::resource('index', ResourseController::class);
Route::resource('admin/user', UserController::class)
    ->middleware('custom');
Route::resource('news', NewsController::class);
Route::get('/filesystem', [HomeController::class, 'filesystem'])->name('ytrty');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.index');

//Route::post('/create', [ResourseController::class, 'create']);
//Route::post('/edit/{id}', [ResourseController::class, 'edit']);
