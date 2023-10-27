<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\RatingController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\MessageController;
use App\Http\Controllers\User\SubjectController;
use App\Http\Controllers\User\TeacherController;
use App\Http\Controllers\User\SponsorizationController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/*
Route::middleware(["auth", "verified"])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('/messages', MessageController::class);
    Route::resource('/ratings', RatingController::class);
    Route::resource('/reviews', ReviewController::class);
    Route::resource('/sponsorizations', SponsorizationController::class);
    Route::resource('/subjects', SubjectController::class);
    Route::resource('/teachers', TeacherController::class);
});*/

Route::middleware(["auth", "verified"])
    ->name('user.') //Da modificare tutti i vari reindirizzamenti alle view di cui cambieremo anche la locazione nelle cartelle
    ->prefix('user')
    ->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/checkout', [OrderController::class, 'token'])->name('checkout')->middleware('auth');
    Route::post('/orders/payment', [OrderController::class, 'makePayment'])->name('payment')->middleware('auth');
    Route::resource('/messages', MessageController::class);
    Route::resource('/ratings', RatingController::class);
    Route::resource('/reviews', ReviewController::class);
    Route::resource('/sponsorizations', SponsorizationController::class);
    Route::resource('/subjects', SubjectController::class);
    Route::resource('/teachers', TeacherController::class);
});




require __DIR__.'/auth.php';
