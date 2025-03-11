<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\itineraryController;

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


// public routes

//user
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//itineraries
Route::get('/itineraries', [itineraryController::class, 'index']);
Route::get('/itineraries/{id}', [itineraryController::class, 'show']);
Route::get('itineraries/search/{name}', [itineraryController::class, 'search']);


// protected routes
Route::group(['middleware' => ['auth:sanctum']] , function(){

    //itineraries
    Route::post('/itineraries', [itineraryController::class, 'store']);
    Route::put('/itineraries/{id}', [itineraryController::class, 'update']);
    Route::delete('/itineraries/{id}', [itineraryController::class, 'delete']);

    //user
    Route::post('/logout', [AuthController::class, 'logout']);
});

