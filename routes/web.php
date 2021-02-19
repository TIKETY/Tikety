<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegularController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
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
    return redirect(app()->getLocale());
});

Route::group(['prefix' => '{language}',
    'middleware' => 'setlanguage'
], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

        Auth::routes(['verify'=>true]);

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/contact', [RegularController::class, 'contact'])->name('contact');
    Route::get('/about', [RegularController::class, 'about'])->name('about');
    Route::get('/faq', [RegularController::class, 'faq'])->name('faq');
    Route::get('/travel', [RegularController::class, 'travel'])->name('travel');
    Route::post('/travel/form', [BusController::class, 'travel'])->name('TravelForm');
    Route::get('/mybuses', [BusController::class, 'MyBus'])->name('mybuses');
    Route::get('/createbus', [BusController::class, 'CreateBus'])->name('CreateBus')->middleware(['auth', 'verifiedphone', 'haverole']);
    Route::get('/showbus/{bus}', [BusController::class, 'show'])->name('ShowBus')->middleware('auth');
    Route::get('/buses', [BusController::class, 'showbuses'])->name('buses');
    Route::post('/createbus/{user}', [BusController::class, 'CreateBusForm'])->name('CreateBusForm')->middleware(['auth', 'verifiedphone', 'haverole']);
    Route::get('/updatebus/{bus}', [BusController::class, 'updatebus'])->name('UpdateBus')->middleware('can:isowner,bus')->middleware(['auth', 'verifiedphone', 'haverole']);
    Route::get('/role', [RoleController::class, 'role'])->name('role')->middleware(['auth', 'verifiedphone']);
    Route::post('/role/{role}', [RoleController::class, 'makeRole'])->name('makerole')->middleware(['auth', 'verifiedphone']);
    Route::put('/updatebus/{bus}', [BusController::class, 'update'])->name('UpdateBusForm')->middleware('can:isowner,bus')->middleware(['auth', 'verifiedphone', 'haverole']);
    Route::post('/connected', [ContactController::class, 'store'])->name('connected');
    Route::post('/contactform', [ContactController::class, 'contact'])->name('ContactForm');
    Route::post('/contactbus/{bus}', [ContactController::class, 'contactbus'])->name('ContactBus')->middleware(['auth', 'verifiedphone', 'haverole']);
    Route::post('/takeseat/{bus}', [BusController::class, 'takeseat'])->name('takeseat')->middleware(['auth', 'can:isowner,bus', 'verifiedphone']);
    Route::delete('/removebus/{bus}',[BusController::class, 'removebus'])->name('removebus')->middleware(['can:isowner,bus', 'auth', 'verifiedphone']);

    Route::get('/fleet/{user}', [FleetController::class, 'ShowFleet'])->name('ShowFleet')->middleware(['auth', 'verifiedphone', 'haverole']);
    Route::post('/buses/{bus}',[FleetController::class, 'AddBusFleet'])->name('AddBusFleet')->middleware(['auth', 'verifiedphone', 'haverole']);
    Route::post('/payseat/{bus}',[BusController::class, 'payseat'])->name('payseat')->middleware('auth');
    Route::put('/revokeseat/{bus}',[BusController::class, 'revokeSeat'])->name('revokeSeat')->middleware(['can:isowner,bus', 'auth', 'verifiedphone', 'haverole']);
    Route::get('/verification_code', [RegularController::class, 'verification_code'])->name('verification_code')->middleware('auth');
    Route::put('/verification_code_put', [RegularController::class, 'verification_code_put'])->name('verification_code_put')->middleware(['auth', 'throttle:3,1440']);
    Route::get('/verification_code_resend', [RegularController::class, 'verification_code_resend'])->name('verification_resend')->middleware('auth', 'throttle:3,1440');
    Route::post('/resetbus/{bus}', [BusController::class, 'resetbus'])->name('resetbus')->middleware(['auth', 'verifiedphone', 'haverole']);

    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
    Route::get('/profile/edit/{user}', [ProfileController::class, 'editprofileview'])->name('editprofileview')->middleware(['auth', 'can:edit_profile, user', 'verifiedphone', 'haverole']);
    Route::put('/profile/edit/{user}', [ProfileController::class, 'editprofile'])->name('editprofile')->middleware(['auth', 'can:edit_profile, user', 'verifiedphone', 'haverole']);

    Route::get('login/facebook', [LoginController::class, 'redirectToProvider'])->name('loginfacebook');
    Route::get('login/facebook/callback', [LoginController::class, 'handleProviderCallback'])->name('loginfacebook_callback');

    Route::get('login/forgot', [RegularController::class, 'forgot_password'])->name('forgot');
    Route::post('login/forgot', [ForgotPasswordController::class, 'forgot_password'])->name('forgot_password')->middleware('throttle:3,1440');
    Route::get('verify/{phone}', [ForgotPasswordController::class, 'verify'])->name('verify');
    Route::post('verify/{phone}', [ForgotPasswordController::class, 'resend'])->name('resend')->middleware('throttle:3,1440');
    Route::get('verify/phone/{token}', [ForgotPasswordController::class, 'tokenVerify'])->name('tokenVerify');
    Route::get('verify/phone/reset/{user}', [ForgotPasswordController::class, 'resetview'])->name('reset')->middleware('auth');
    Route::put('verify/phone/reset/password', [ForgotPasswordController::class, 'resetpassword'])->name('resetPassword')->middleware('auth');

    Route::get('/privacy', [RegularController::class, 'privacy'])->name('privacy');
    Route::get('/verification/{user}', [RegularController::class, 'verification'])->name('verification')->middleware('auth');
    Route::post('/verification/{user}/resend', [ProfileController::class, 'verification_resend'])->name('verification_email_resend')->middleware('auth');
    Route::get('/email/verification/{token}', [ProfileController::class, 'verify'])->name('verify_email')->middleware('auth');

    Route::post('/profile/{id}/delete', [ProfileController::class, 'delete'])->name('delete');
    Route::get('/soon', [RegularController::class, 'soon'])->name('soon');

    Route::post('/review/{bus}', [ReviewController::class, 'store'])->name('review')->middleware(['auth', 'verifiedphone']);
    Route::post('/approve_review/{bus}/{review_user_id}', [ReviewController::class, 'approve'])->name('approve_review')->middleware(['auth', 'verifiedphone']);
});
