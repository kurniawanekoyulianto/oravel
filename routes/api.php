<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\SubDepartmentController;
use App\Http\Controllers\API\MesinController;
use App\Http\Controllers\API\SatuanController;

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

Route::resource('/dept', DepartmentController::class);
Route::resource('/divi', SubDepartmentController::class);
Route::resource('/mchn', MesinController::class); 
Route::resource('/uofm', SatuanController::class);

