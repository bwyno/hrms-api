<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\PositionController;
use App\Http\Controllers\v1\LeaveTypeController;
use App\Http\Controllers\v1\DepartmentController;
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


Route::prefix('positions')->group(function () {
    Route::get('/',[PositionController::class, 'index']);
    Route::get('/{id}',[PositionController::class, 'show']);
    Route::patch('/{id}',[PositionController::class, 'update']);
    Route::delete('/{id}',[PositionController::class, 'destroy']);
    Route::post('/',[PositionController::class, 'store']);
});

Route::prefix('leave-types')->group(function () {
    Route::get('/',[LeaveTypeController::class, 'index']);
    Route::get('/{id}',[LeaveTypeController::class, 'show']);
    Route::patch('/{id}',[LeaveTypeController::class, 'update']);
    Route::delete('/{id}',[LeaveTypeController::class, 'destroy']);
    Route::post('/',[LeaveTypeController::class, 'store']);
});

Route::prefix('departments')->group(function () {
    Route::get('/',[DepartmentController::class, 'index']);
    Route::get('/{id}',[DepartmentController::class, 'show']);
    Route::post('/',[DepartmentController::class, 'create']);
    Route::patch('/{id}',[DepartmentController::class, 'update']);
    Route::delete('/{id}',[DepartmentController::class, 'destroy']);
});