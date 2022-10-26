<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\VaksinController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\UserController;

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

    Route::post('login', [UserController::class,'login']);
    Route::post('logout', [UserController::class,'logout']);

    //Users
    Route::post('master/user', [UserController::class,'create']);
    Route::put('master/user/{id}', [UserController::class,'edit']);
    Route::delete('master/user/{id}', [UserController::class,'delete']);
    Route::get('master/user', [UserController::class,'get_users']);
    Route::get('master/user/{id}', [UserController::class,'get_user_detail']);

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
    Route::post('master/vaksin', [VaksinController::class,'create']);
    Route::put('master/vaksin/{id}', [VaksinController::class,'edit']);
    Route::delete('master/vaksin/{id}', [VaksinController::class,'delete']);
    Route::get('master/vaksin', [VaksinController::class,'get_vaksins']);
    Route::get('master/vaksin/{id}', [VaksinController::class,'get_vaksin_detail']);

    //Faskes_vaksin
    Route::get('faskes/vaksin', [FaskesController::class,'get_faskes_vaksin']);
    Route::post('faskes/vaksin', [FaskesController::class,'add_faskes_vaksin']);
    Route::put('faskes/vaksin/{id}', [FaskesController::class,'edit_faskes_vaksin']);
    Route::delete('faskes/vaksin/{id}', [FaskesController::class,'delete_faskes_vaksin']);
    Route::get('faskes/vaksin/{id}', [FaskesController::class,'get_faskesvaksin_detail']);

    //Faskes
    Route::post('faskes', [FaskesController::class,'create']);
    Route::put('faskes/{id}', [FaskesController::class,'edit']);
    Route::delete('faskes/{id}', [FaskesController::class,'delete']);
    Route::get('faskes', [FaskesController::class,'get_faskes']);
    Route::get('faskes/{id}', [FaskesController::class,'get_faskes_detail']);

    //Report
    Route::post('report', [ReportController::class,'get_faskes_vaksin']);    



});
    