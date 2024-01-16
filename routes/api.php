<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\PositionController;
use Illuminate\Http\Request;
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

Route::get('auth', [AuthController::class, 'redirectToAuth']);
Route::get('auth/callback', [AuthController::class, 'handleAuthCallback']);

Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class, 'index']);
    Route::get('/{user}',[UserController::class, 'show']);
    Route::patch('/{user}',[UserController::class, 'update']);
    Route::delete('/{user}',[UserController::class, 'destroy']);
});


Route::get('/users',[UserController::class, 'index']);
Route::get('/users/{user}',[UserController::class, 'show']);
Route::patch('/users/{user}',[UserController::class, 'update']);
Route::delete('/users/{user}',[UserController::class, 'destroy']);

Route::get('/positions',[PositionController::class, 'index']);
Route::get('/positions/{id}',[PositionController::class, 'show']);
Route::patch('/positions/{id}',[PositionController::class, 'update']);
Route::delete('/positions/{id}',[PositionController::class, 'destroy']);
Route::post('/positions',[PositionController::class, 'store']);
