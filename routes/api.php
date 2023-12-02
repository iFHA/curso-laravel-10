<?php

use App\Http\Controllers\Api\ReplySupportApiController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('/supports', SupportController::class);
    Route::get('/supports/{id}/replies', [ReplySupportApiController::class, 'index'])->name('replies.index');
    Route::post('/supports/{id}/replies', [ReplySupportApiController::class, 'store'])->name('replies.store');
    Route::delete('/replies/{id}', [ReplySupportApiController::class, 'destroy'])->name('replies.destroy');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});
