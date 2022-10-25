<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\VaksinController;
use App\Http\Controllers\FaskesController;

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

Route::group([
    'prefix' => 'v1', 
    'as' => 'api', 
    'namespace' => 'api/v1', 
    //'middleware' => ['auth:api']
  ], function () {

    //Users
    Route::post('users', [UserController::class,'create']);
    Route::put('users/{id}', [UserController::class,'edit']);
    Route::delete('users/{id}', [UserController::class,'delete']);
    Route::get('users', [UserController::class,'get_users']);
    Route::get('users/{id}', [UserController::class,'get_user_detail']);

    //City
    Route::post('master/city', [CityController::class,'create']);
    Route::put('master/city/{id}', [CityController::class,'edit']);
    Route::delete('master/city/{id}', [CityController::class,'delete']);
    Route::get('master/city', [CityController::class,'get_cities']);
    Route::get('master/city/{id}', [CityController::class,'get_city_detail']);

    //Province
    Route::post('master/province', [ProvinceController::class,'create']);
    Route::put('master/province/{id}', [ProvinceController::class,'edit']);
    Route::delete('master/province/{id}', [ProvinceController::class,'delete']);
    Route::get('master/province', [ProvinceController::class,'get_provinces']);
    Route::get('master/province/{id}', [ProvinceController::class,'get_province_detail']);

    //Vaksin
    Route::post('faskes/vaksin', [VaksinController::class,'create']);
    Route::put('faskes/vaksin/{id}', [VaksinController::class,'edit']);
    Route::delete('faskes/vaksin/{id}', [VaksinController::class,'delete']);
    Route::get('faskes/vaksin', [VaksinController::class,'get_vaksins']);
    Route::get('faskes/vaksin/{id}', [VaksinController::class,'get_vaksin_detail']);

    //Faskes
    Route::post('faskes', [FaskesController::class,'create']);
    Route::put('faskes/{id}', [FaskesController::class,'edit']);
    Route::delete('faskes/{id}', [FaskesController::class,'delete']);
    Route::get('faskes', [FaskesController::class,'get_faskes']);
    Route::get('faskes/{id}', [FaskesController::class,'get_faskes_detail']);
});
    