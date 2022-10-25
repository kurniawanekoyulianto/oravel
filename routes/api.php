<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\SubDepartmentController;
use App\Http\Controllers\API\MesinController;
use App\Http\Controllers\API\SatuanController;
use App\Http\Controllers\API\PeriodeController;
use App\Http\Controllers\API\DefectController;

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

// Insert master data departemen
Route::resource('/dept', DepartmentController::class);

// Insert master data sub departemen atau divisi
Route::resource('/divi', SubDepartmentController::class);

// Insert master data mesin
Route::resource('/mchn', MesinController::class);

// Insert master data satuan
Route::resource('/uofm', SatuanController::class);

// Insert master data periode
Route::post('/prd', 'App\Http\Controllers\API\PeriodeController@store');

// Insert data inspeksi header
Route::post('/hd', 'App\Http\Controllers\API\InspeksiHeaderController@store');

// Insert data inspeksi detail
Route::post('/dt', 'App\Http\Controllers\API\InspeksiDetailController@store');

// Delete data inspeksi
Route::delete('/cdet/{id}', 'App\Http\Controllers\API\InspeksiDetailController@destroy');

// Delete data Periode
Route::delete('/pdel/{id}', 'App\Http\Controllers\API\PeriodeController@destroy');

// Update data Periode
Route::put('/pupd', 'App\Http\Controllers\API\PeriodeController@update');

// Insert Data Defect
Route::post('/dfct', 'App\Http\Controllers\API\DefectController@store');

// Delete Data Defect
Route::delete('/hdfct/{id}', 'App\Http\Controllers\API\DefectController@destroy');

// Update data Defect
Route::put('/udfct', 'App\Http\Controllers\API\DefectController@update');
