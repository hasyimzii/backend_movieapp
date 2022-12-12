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
    Route::get('/search', [MovieController::class, 'search'])->name('search');
    Route::post('/create', [MovieController::class, 'create'])->name('create');
    Route::post('/update/{id}', [MovieController::class, 'update'])->name('update');
    Route::delete('/{id}', [MovieController::class, 'delete'])->name('delete');
});
