<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiTaskController;

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


Route::group([
    "middleware" =>["auth:sanctum"]
], function(){


});
Route::get('tasks',[ApiTaskController::class,'TaskView']); 
Route::post('upload',[ApiTaskController::class,'Upload']);