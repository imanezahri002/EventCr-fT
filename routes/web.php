<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CodepromoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TagController;
use App\Models\Event;
use GuzzleHttp\Client;
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
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/categorie',[CategorieController::class,'index'])->name('admin.categorie');
    Route::post('/admin/categorie/create',[CategorieController::class,'store'])->name('admin.categorie.store');
    Route::delete('/admin/categorie/{categorie}',[CategorieController::class,'destroy'])->name('admin.categorie.destroy');
    Route::post('/admin/categorie/update/{categorie}',[CategorieController::class,'update'])->name('admin.categorie.update');

    Route::get('/admin/users',[AdminController::class,'displayUsers'])->name('admin.users');
    Route::patch('/admin/users/{id}/ban', [AdminController::class, 'ban'])->name('admin.users.ban');
    Route::patch('/admin/users/{id}/activate', [AdminController::class, 'activate'])->name('admin.users.activate');

    Route::get('/admin/events',[AdminController::class,'displayEvents'])->name('admin.events');

    Route::get('/admin/tags',[TagController::class,'index'])->name('admin.tags');
    Route::post('/admin/tags/create',[TagController::class,'store'])->name('admin.tags.store');
    Route::delete('/admin/tags/{tag}',[TagController::class,'destroy'])->name('admin.tags.destroy');
    Route::post('/admin/tags/update/{tag}',[TagController::class,'update'])->name('admin.tags.update');

    Route::get('/admin/events/{event}', [AdminController::class, 'detailEvent'])->name('admin.events.detail');

    Route::patch('/event/{id}/accept', [AdminController::class, 'accept'])->name('event.accept');
    Route::patch('/event/{id}/refuse', [AdminController::class, 'refuse'])->name('event.refuse');



});

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::get('/organisateur/dashboard', [OrganisateurController::class, 'index'])->name('organisateur.dashboard');
    Route::get('/organisateur/profile',[OrganisateurController::class,'profile'])->name('organisateur.profile');
    Route::put('/organisateur/profile/update/{user}',[OrganisateurController::class,'updateProfile'])->name('organisateur.profile.update');

    Route::get('/organisateur/events',[EventController::class,'index'])->name('organisateur.events');

    Route::get('/organisateur/events/show/{event}',[EventController::class,'show'])->name('organisateur.events.show');
    Route::get('/organisateur/events/create',[EventController::class,'create'])->name('organisateur.events.create');
    Route::post('/organisateur/events/store',[EventController::class,'store'])->name('organisateur.events.store');
    Route::get('/organisateur/events/edit/{event}',[EventController::class,'edit'])->name('organisateur.events.edit');

    Route::put('/organisateur/events/update/{event}',[EventController::class,'update'])->name('organisateur.events.update');
    Route::delete('/organisateur/events/delete/{event}',[EventController::class,'destroy'])->name('organisateur.events.destroy');


});
Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.events');
    Route::get('/reservation/{event}', [ClientController::class, 'addReservation'])->name('reservations.create');
    // Route::post('/reservation/{reservation}',[ClientController::class,'paiement'])->name('reservations.paiement');

    //  Route::get('/client/reservations',[ClientController::class,'listeReservation'])->name('client.reservations');
    Route::get('/client/profile',[ClientController::class,'profile'])->name('client.profile');
    Route::put('/client/profile/update/{user}',[ClientController::class,'updateProfile'])->name('client.profile.update');

    Route::post('validate-codePromo',[CodepromoController::class,'validateCodePromo'])->name('validate.codePromo');

    Route::post('/client/reservations',[ReservationController::class,'store'])->name('client.reservations.store');
    Route::get('/client/reservations/listeReservations',[ReservationController::class,'index'])->name('client.reservations.listeReservations');
});



// Route::get('/profile', function () {
//     return view('profile');
// })->middleware(['auth', 'verified']);
