<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FeedbackLikeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/dashboard', [DashboardController::class, 'index'])
// ->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])
->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'login'])
->name('login');
Route::post('/login', [LoginController::class, 'loggedIn']);

Route::get('/logout', [LogoutController::class, 'logout'])
->name('logout');

Route::get('/feedback', [FeedbackController::class, 'feedback'])
->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'sendFeedback']);

Route::get('/profile', [FeedbackController::class, 'recievedFeedback'])
->name('profile');

Route::post('/feedback/{feedback}/likes', [FeedbackLikeController::class, 'store'])
->name('feedback.like');
Route::delete('/feedback/{feedback}/likes', [FeedbackLikeController::class, 'destroy']);

Route::delete('/feedback/{feedback}', [FeedbackController::class, 'destroy'])
->name('feedback.delete');

Route::get('/', function () {
    return view('home');
})->name('home');

