<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegularController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
})->name('welcome');

    Auth::routes(['verify'=>true]);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [RegularController::class, 'contact'])->name('contact')->middleware('verifiedphone');
Route::get('/about', [RegularController::class, 'about'])->name('about');
Route::get('/faq', [RegularController::class, 'faq'])->name('faq')->middleware(['auth', 'haverole']);
Route::get('/travel', [RegularController::class, 'travel'])->name('travel');
Route::post('/travel/form', [BusController::class, 'travel'])->name('TravelForm')->middleware('auth');
Route::get('/mybuses', [BusController::class, 'MyBus'])->name('mybuses');
Route::get('/createbus', [BusController::class, 'CreateBus'])->name('CreateBus')->middleware('auth');
Route::get('/showbus/{bus}', [BusController::class, 'show'])->name('ShowBus')->middleware('auth');
Route::get('/buses', [BusController::class, 'showbuses'])->name('buses');
Route::post('/createbus/{user}', [BusController::class, 'CreateBusForm'])->name('CreateBusForm');
Route::get('/updatebus/{bus}', [BusController::class, 'updatebus'])->name('UpdateBus')->middleware('can:isowner,bus');
Route::get('/role', [RoleController::class, 'role'])->name('role')->middleware('auth');
Route::post('/role/{role}', [RoleController::class, 'makeRole'])->name('makerole')->middleware('auth');
Route::put('/updatebus/{bus}', [BusController::class, 'update'])->name('UpdateBusForm')->middleware('can:isowner,bus');
Route::post('/connected', [ContactController::class, 'store'])->name('connected');
Route::post('/contactform', [ContactController::class, 'contact'])->name('ContactForm');
Route::post('/contactbus/{bus}', [ContactController::class, 'contactbus'])->name('ContactBus')->middleware('auth');
Route::post('/takeseat/{bus}', [BusController::class, 'takeseat'])->name('takeseat')->middleware(['auth', 'can:isowner,bus']);
Route::delete('/removebus/{bus}',[BusController::class, 'removebus'])->name('removebus')->middleware('can:isowner,bus');

Route::get('/fleet/{user}', [FleetController::class, 'ShowFleet'])->name('ShowFleet')->middleware('can:view, fleet');
Route::post('/buses/{bus}',[FleetController::class, 'AddBusFleet'])->name('AddBusFleet');
Route::post('/payseat/{bus}',[BusController::class, 'payseat'])->name('payseat');
Route::put('/revokeseat/{bus}',[BusController::class, 'revokeSeat'])->name('revokeSeat')->middleware('can:isowner,bus');
Route::get('/verification_code', [RegularController::class, 'verification_code'])->name('verification_code');
Route::put('/verification_code_put', [RegularController::class, 'verification_code_put'])->name('verification_code_put')->middleware('throttle:10,1440');
Route::get('/verification_code_resend', [RegularController::class, 'verification_code_resend'])->name('verification_resend')->middleware('throttle:3,1440');
Route::post('/resetbus/{bus}', [BusController::class, 'resetbus'])->name('resetbus');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile');
Route::get('/profile/edit/{user}', [ProfileController::class, 'editprofileview'])->name('editprofileview');
Route::put('/profile/edit/{user}', [ProfileController::class, 'editprofile'])->name('editprofile');

Route::get('login/facebook', [LoginController::class, 'redirectToProvider'])->name('loginfacebook');
Route::get('login/facebook/callback', [LoginController::class, 'handleProviderCallback'])->name('loginfacebook_callback');
