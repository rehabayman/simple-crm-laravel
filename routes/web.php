<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::group(['middleware' => ['auth', 'termsAccepted']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/users/{user}/restore', [UserController::class, 'restore'])->middleware('role:admin')->name('users.restore');
    Route::resource('clients', ClientController::class)->middleware('role:admin');
    Route::resource('users', UserController::class)->middleware('role:admin');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('terms', [TermsController::class, 'index'])->name('terms.index');
    Route::post('terms', [TermsController::class, 'store'])->name('terms.store');
});
