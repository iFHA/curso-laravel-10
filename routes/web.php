<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SupportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/supports", [SupportController::class, 'index'])->name('supports.index');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::post('/supports/store', [SupportController::class, 'store'])->name('supports.store');
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
Route::put('/supports/{id}/update', [SupportController::class, 'update'])->name('supports.update');

Route::get('/', function () {
    return to_route('supports.index');
});
