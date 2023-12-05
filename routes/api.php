<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ApplyJobsController;
use App\Http\Controllers\JobVancanciesController;
use App\Http\Controllers\ValidationsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->name('v1.')->group(function () {
    Route::prefix('auth')->name('auth.')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });


    Route::middleware('custom.auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);

        Route::post('validation', [ValidationsController::class, 'store']);
        Route::get('validations', [ValidationsController::class, 'getValidation']);
        Route::get('job_vacancies', [JobVancanciesController::class, 'index']);
        Route::get('job_vacancies/{id}', [JobVancanciesController::class, 'vacancyById']);
        Route::apiResource('applications', ApplyJobsController::class)->only(['index', 'store']);
    });
});
