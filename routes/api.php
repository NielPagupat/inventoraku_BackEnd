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
Route::get('getPrice', [getController::class, 'getProdPrice']);
Route::get('getResDet', [getController::class, 'getResDet']);
Route::get('getProfit', [getController::class, 'getProfit']);
Route::get('getItemProfit', [getController::class, 'getItemProfit']);

Route::get('getSingleDaily',[getController::class, 'getSingleDaily']);
Route::get('getSingleWeekly',[getController::class, 'getSingleWeekly']);
Route::get('getSingleMonthly',[getController::class, 'getSingleMonthly']);
Route::get('getSingleYearly',[getController::class, 'getSingleYearly']);
Route::get('getTotalDaily',[getController::class, 'getTotalDaily']);
Route::get('getTotalWeekly',[getController::class, 'getTotalWeekly']);
Route::get('getTotalMonthly',[getController::class, 'getTotalMonthly']);
Route::get('getTotalYearly',[getController::class, 'getTotalYearly']);

Route::post('register',[postController::class, 'registerUser']);
Route::post('addProduct', [postController::class, 'addProduct']);
Route::post('save',[postController::class, 'saveEditProduct']);
Route::post('itemSold', [postController::class, 'itemSold']);
Route::post('totalSold', [postController::class, 'totalSold']);
Route::post('setResInfo',[postController::class, 'setResInfo']);
Route::post('setAutoRes', [postController::class, 'setAutoRes']);