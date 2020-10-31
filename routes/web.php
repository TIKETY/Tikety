<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegularController;
use App\Http\Controllers\BusController;

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
Route::get('/faq', [RegularController::class, 'faq'])->name('faq');
Route::get('/buses/{user}', [BusController::class, 'MyBus'])->name('bus')->middleware('verified');
Route::get('/createbus', [BusController::class, 'CreateBus'])->name('CreateBus')->middleware('verified');
Route::get('/showbus/{bus}', [BusController::class, 'show'])->name('ShowBus');
Route::get('/buses', [BusController::class, 'showbuses'])->name('buses');
Route::post('/createbus/{user}', [BusController::class, 'CreateBusForm'])->name('CreateBusForm')->middleware('verified');
Route::get('/updatebus/{bus}', [BusController::class, 'updatebus'])->name('UpdateBus')->middleware('verified');
Route::put('/updatebus/{bus}', [BusController::class, 'update'])->name('UpdateBusForm')->middleware('verified');
