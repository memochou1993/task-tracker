<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TokenController;
use App\Http\Resources\UserResource;
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

Route::post('tokens', [TokenController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('tokens', [TokenController::class, 'destroy']);
    Route::apiResource('tasks', TaskController::class);
});
