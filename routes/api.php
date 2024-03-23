<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BarangController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\OrderPOController;
use App\Http\Controllers\api\CustomerController;
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
/**
 * route "/register"
 * @method "POST"
 */
// Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

/**
 * route "/user"
 * @method "GET"
 */
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logincust', App\Http\Controllers\Api\LoginCustController::class)->name('logincust');
Route::middleware('auth:api')->get('/customer', function (Request $request) {
    return $request->customer();
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('barang', BarangController::class);
Route::apiResource('order', OrderController::class);
Route::apiResource('orderpo', OrderPOController::class);
Route::apiResource('customer', CustomerController::class);
// Route::resource('order/{id}','OrderController', ['parameters'=> ['id' => 'id']] );