<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsApiController;

Route::prefix('v1')->middleware('throttle:60,1')->group(function () {
    Route::get('/job-list', [JobsApiController::class, 'index']);
    Route::get('/job-list/{job}', [JobsApiController::class, 'show']);
    Route::get('/job-list/apply/{job}', [JobsApiController::class, 'jobApply']);
    Route::post('/job-list/apply/{job}', [JobsApiController::class, 'jobApplyStore']);
});
