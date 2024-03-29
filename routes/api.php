<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlutterAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/search', [FlutterAPI::class, 'search']);

Route::get('/buses', [FlutterAPI::class, 'buses']);

Route::get('/bus/{bus}', [FlutterAPI::class, 'show']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/me', function(Request $request) {
        return auth()->user();
    });
    Route::post('/auth/verify',[AuthController::class, 'verify']);

    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
