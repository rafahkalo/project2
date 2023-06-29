<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use  App\Http\Controllers\BranchsController;
use  App\Http\Controllers\GovermentController;
use  App\Http\Controllers\StarController;
use  App\Http\Controllers\OfficesController;
use App\Http\Controllers\Auth\AuthController;
<<<<<<< HEAD
use App\Http\Controllers\CarController;
use  App\Http\Controllers\TypeController;
<<<<<<< HEAD
=======
use  App\Http\Controllers\DriverController;
>>>>>>> 38fac941b19a62499b1fe823b56acd1d48d0e5f8
=======
use  App\Http\Controllers\TypeController;
>>>>>>> 56a234b2000b2235402f92a9f8949f53699211b0
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
########### OfficesController ###################
Route::post('requestJoin',[OfficesController::class,'requestJoin']);
Route::post('AddOffice',[OfficesController::class,'AddOffice']);
Route::get('showAllOffices',[OfficesController::class,'showAllOffices']);
Route::post('AcceptOffice/{id}',[OfficesController::class,'AcceptOffice']);
Route::delete('RefuseOffice/{id}',[OfficesController::class,'RefuseOffice']);
Route::post('searchbyName',[OfficesController::class,'searchByName']);
<<<<<<< HEAD
Route::post('loginOffice',[OfficesController::class,'loginOffice']);


########### CarController ###################
Route::post('car/add',[CarController::class,'store']);

<<<<<<< HEAD




=======
########### DriverController ###################
Route::post('driver/JoinRequest',[DriverController::class,'JoinRequest']);
Route::get('driver/AcceptDriver/{id}',[DriverController::class,'AcceptDriver']);
Route::delete('driver/RefuseDriver/{id}',[DriverController::class,'RefuseDriver']);

########### ExternalTravelController ###################
Route::get('ExternalTravel/getTravels',[ExternalTravelController::class,'getTravels']);

//////////////////////////////////////////////////////////
>>>>>>> 38fac941b19a62499b1fe823b56acd1d48d0e5f8
=======






>>>>>>> 56a234b2000b2235402f92a9f8949f53699211b0
Route::post('addgoverment',[GovermentController::class,'addGoverment']);
Route::post('addbranch',[BranchsController::class,'addBranch']);
Route::get('searchByBranch/{id}',[BranchsController::class,'searchByBranch']);
Route::get('alllBranches',[BranchsController::class,'alllBranches']);
Route::post('addtypetravel',[TypeController::class,'addtype']);
Route::post('addstars',[StarController::class,'addStars']);



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('getInfoOffice/{id}',[OfficesController::class,'getInformationOffice']);
Route::get('getOfficesByStars/{num}',[OfficesController::class,'getOfficesByStars']);
Route::post('editStar/{id}',[OfficesController::class,'editStar']);
Route::middleware('auth:sanctum')->group( function () {

});