<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
=======
use  App\Http\Controllers\BranchsController;
use  App\Http\Controllers\GovermentController;
use  App\Http\Controllers\StarController;
use  App\Http\Controllers\OfficesController;
use  App\Http\Controllers\TypeController;
>>>>>>> 7f7f7282d98748859990061e432598cb63f6c8a2
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
<<<<<<< HEAD

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
=======
Route::post('addoffice',[OfficesController::class,'addOffice']);
Route::post('addgoverment',[GovermentController::class,'addGoverment']);
Route::post('addbranch',[BranchsController::class,'addBranch']);
Route::post('addtypetravel',[TypeController::class,'addtype']);
Route::post('addstars',[StarController::class,'addStars']);
Route::middleware('auth:sanctum')->group( function () {

});
>>>>>>> 7f7f7282d98748859990061e432598cb63f6c8a2
