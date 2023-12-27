<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\getController;
use App\Http\Controllers\postController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('login', [getController::class, 'login']);
Route::get('getUdata',[getController::class, 'getUserData']);
Route::get('getProduct', [getController::class, 'getProduct']);

Route::post('register',[postController::class, 'registerUser']);
Route::post('addProduct', [postController::class, 'addProduct']);