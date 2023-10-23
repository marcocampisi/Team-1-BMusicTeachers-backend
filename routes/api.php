<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\ChartController;
//Cos'è lo slug?

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.')->group(function(){
    Route::post('/message/create', [MessageController::class, 'store']);
    Route::post('/ratings/create', [RatingController::class, 'store']);
    Route::post('/reviews/create', [ReviewController::class, 'store']);
    Route::resource('/subjects', SubjectController::class)->only([
        'index',
        'show'
    ]);
    Route::resource('/teachers', TeacherController::class)->only([
        'index',
        'show',
    ]);
    Route::resource('/chart', ChartController::class)->only(['show']);
});

Route::post('/teachers/search', [TeacherController::class, 'search']);
