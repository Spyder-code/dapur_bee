<?php

use App\Http\Controllers\ExpeditionController;
use App\Http\Controllers\PaymentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('notification/handling', [PaymentController::class, 'notificationHandling']);
Route::get('ongkir/provinsi', [ExpeditionController::class,'getProvinceOngkir'])->name('api.ongkir.province');
Route::get('ongkir/kota', [ExpeditionController::class,'getCityOngkir'])->name('api.ongkir.city');
Route::post('ongkir', [ExpeditionController::class,'getOngkir'])->name('api.ongkir');
