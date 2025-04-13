<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/email/verify/{id}', [AuthController::class, 'verify'])->name('verification.verify');
//resending email
// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/formLogin');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

Route::get('/register',[AuthController::class,'registerView'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.post');
Route::get('/formLogin',[AuthController::class,'loginView'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-test', function () {
    return view('admin.dashboard');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth', 'verified']);
