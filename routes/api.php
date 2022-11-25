<?php

use App\Http\Controllers\Api\MovieController;
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

// Movie
Route::prefix('movie')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('index');
    Route::post('/search', [MovieController::class, 'search'])->name('search');
    Route::post('/create', [MovieController::class, 'create'])->name('create');
    Route::post('/update', [MovieController::class, 'update'])->name('update');
    Route::post('/delete', [MovieController::class, 'delete'])->name('delete');
});
