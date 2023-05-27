<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use  App\Http\Controllers\BranchsController;
use  App\Http\Controllers\GovermentController;
use  App\Http\Controllers\StarController;
use  App\Http\Controllers\OfficesController;
use App\Http\Controllers\Auth\AuthController;
use  App\Http\Controllers\TypeController;
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

Route::post('addoffice',[OfficesController::class,'addOffice']);
Route::post('addgoverment',[GovermentController::class,'addGoverment']);
Route::post('addbranch',[BranchsController::class,'addBranch']);
Route::get('searchByBranch/{id}',[BranchsController::class,'searchByBranch']);
Route::get('alllBranches',[BranchsController::class,'alllBranches']);
Route::post('addtypetravel',[TypeController::class,'addtype']);
Route::post('addstars',[StarController::class,'addStars']);



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('showAllOffices',[OfficesController::class,'showAllOffices']);
Route::post('AcceptOffice/{id}',[OfficesController::class,'AcceptOffice']);
Route::delete('RefuseOffice/{id}',[OfficesController::class,'RefuseOffice']);
Route::post('searchbyName',[OfficesController::class,'searchByName']);

Route::get('getInfoOffice/{id}',[OfficesController::class,'getInformationOffice']);
Route::get('getOfficesByStars/{num}',[OfficesController::class,'getOfficesByStars']);
Route::post('editStar/{id}',[OfficesController::class,'editStar']);
Route::middleware('auth:sanctum')->group( function () {

});