<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClientController::class, 'index'])->name('home');
Route::get('/{name}', [ClientController::class, 'show'])->name('detail');
Route::get('/apply/{name}', [ClientController::class, 'jobApply'])->name('apply');
Route::post('/apply/{name}', [ClientController::class, 'jobApplyStore'])->name('apply-store');
// Response page
Route::get('/unauthorized', function () {
    return view('pages.response.unauthorized');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');
        // user management
        Route::get('/admin/manage-user', [AdminController::class, 'manageUser'])->name('admin-manage-user');
        Route::get('/admin/manage-user/edit/{id}', [AdminController::class, 'userEdit'])->name('admin-edit-user');
        Route::put('/admin/manage-user/edit/{id}', [AdminController::class, 'userUpdate'])->name('admin-update-user');
        Route::delete('/admin/manage-user/{id}', [AdminController::class, 'userDelete'])->name('admin-delete-user');

        // joblist
        Route::get('/admin/job-list', [JobListController::class, 'jobIndex'])->name('admin-job-index');
        Route::get('/admin/job-list/create', [JobListController::class, 'jobCreate'])->name('admin-job-create');
        Route::post('/admin/job-list/create', [JobListController::class, 'jobStore'])->name('admin-job-store');
        Route::get('/admin/job-list/edit/{name}', [JobListController::class, 'jobEdit'])->name('admin-job-edit');
        Route::put('/admin/job-list/edit/{name}', [JobListController::class, 'jobUpdate'])->name('admin-job-update');
        Route::get('/admin/job-list/{name}', [JobListController::class, 'jobDetail'])->name('admin-job-detail');
        Route::delete('/admin/job-list/{name}', [JobListController::class, 'jobDestroy'])->name('admin-job-destroy');
    });

    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/user/dashboard', [UserController::class, 'index'])->name('user-dashboard');
        Route::get('/user/history-application', [UserController::class, 'applicationHistory'])->name('user-application');
    });
});
