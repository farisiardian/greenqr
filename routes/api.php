<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Htpp\Controllers\ProfileController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->get('/test', function (Request $request) {
    return 'test';
});

Route::middleware('api')->post('/login', [App\Http\Controllers\Api\AccessTokenController::class, 'issueToken']);

Route::middleware('api')->post('/tempcode', [App\Http\Controllers\Api\RegisterController::class, 'tempcode']);
Route::middleware('auth:api')->post('/tempcodeauth', [App\Http\Controllers\Api\RegisterController::class, 'tempcodeauth']);
Route::middleware('api')->post('/codecheck', [App\Http\Controllers\Api\RegisterController::class, 'codecheck']);
Route::middleware('api')->post('/register', [App\Http\Controllers\Api\RegisterController::class, 'register']);

Route::middleware('auth:api')->post('/logout', [App\Http\Controllers\Api\HomeController::class, 'logout']);
Route::middleware('auth:api')->get('/home', [App\Http\Controllers\Api\HomeController::class, 'home']);

Route::middleware('auth:api')->post('/markasread', [App\Http\Controllers\Api\NotificationController::class, 'markasread']);


Route::middleware('api')->post('/callback_url', [\App\Http\Controllers\Api\PaymentController::class, 'callback_url']);
Route::middleware('api')->post('/token', [\App\Http\Controllers\Api\PaymentController::class, 'token']);
