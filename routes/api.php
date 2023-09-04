<?php

use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;
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

// Route::get('/todos',[ToDoController::class,'index']);
// Route::post('/save',[ToDoController::class,'store']);
// Route::put('/update/{id}',[ToDoController::class,'update']);
// Route::delete('/delete/{id}',[ToDoController::class,'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum', 'custom.auth'], 'prefix' => 'user'], function () {
    Route::get('/todos', [ToDoController::class, 'index']);
    Route::post('/save', [ToDoController::class, 'store']);
    Route::put('/update/{todo}', [ToDoController::class, 'update']);
    Route::delete('/delete/{todo}', [ToDoController::class, 'destroy']);
    Route::post("logout",[UserController::class,'logout']);

});


Route::post("login",[UserController::class,'login']);

