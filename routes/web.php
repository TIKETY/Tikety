<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegularController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\FleetController;

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
Route::get('/contact', [RegularController::class, 'contact'])->name('contact');
Route::get('/about', [RegularController::class, 'about'])->name('about');
Route::get('/faq', [RegularController::class, 'faq'])->name('faq')->middleware('haverole');
Route::get('/travel', [RegularController::class, 'travel'])->name('travel');
Route::post('/travel/form', [BusController::class, 'travel'])->name('TravelForm')->middleware('auth');
Route::get('/buses/{user}', [BusController::class, 'MyBus'])->name('bus');
Route::get('/createbus', [BusController::class, 'CreateBus'])->name('CreateBus');
Route::get('/showbus/{bus}', [BusController::class, 'show'])->name('ShowBus');
Route::get('/buses', [BusController::class, 'showbuses'])->name('buses');
Route::post('/createbus/{user}', [BusController::class, 'CreateBusForm'])->name('CreateBusForm');
Route::get('/updatebus/{bus}', [BusController::class, 'updatebus'])->name('UpdateBus');
Route::get('/role', [RoleController::class, 'role'])->name('role')->middleware('auth');
Route::post('/role/{role}', [RoleController::class, 'makeRole'])->name('makerole')->middleware('auth');
Route::put('/updatebus/{bus}', [BusController::class, 'update'])->name('UpdateBusForm');
Route::post('/connected', [ContactController::class, 'store'])->name('connected');
Route::post('/contactform', [ContactController::class, 'contact'])->name('ContactForm');
Route::post('/contactbus/{bus}', [ContactController::class, 'contactbus'])->name('ContactBus')->middleware('auth');
Route::post('/takeseat/{bus}', [BusController::class, 'takeseat'])->name('takeseat')->middleware('auth');
Route::delete('/removebus/{bus}',[BusController::class, 'removebus'])->name('removebus');

Route::get('/fleet/{user}', [FleetController::class, 'ShowFleet'])->name('ShowFleet');
Route::post('/buses/{bus}',[FleetController::class, 'AddBusFleet'])->name('AddBusFleet');
Route::post('/payseat/{bus}',[BusController::class, 'payseat'])->name('payseat');
