<?php

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get("/test",function(){
    return ["name"=>"Zain Arif","gmail"=>"zain.siliconplex@gmail.com"];
});

Route::post('addstudent',[StudentController::class,'create']);
Route::put('update-record',[StudentController::class,'update']);
Route::delete('reocrd-deleted/{id}',[StudentController::class,'delete']);
Route::get('serach-reocord/{std_name}',[StudentController::class,'search']);

// Route::post('sign-up',[UserController::class,'signup']);