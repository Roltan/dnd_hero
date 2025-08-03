<?php

use App\Http\Controllers\DraftController;
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

Route::prefix('/draft')->group(function () {
    Route::get('/list', [DraftController::class, 'getList'])->middleware('auth.check');
    Route::post('/new', [DraftController::class, 'new'])->middleware('auth.check');
    Route::post('/edit', [DraftController::class, 'edit'])->middleware('auth.check');
    Route::get('/{draft}', [DraftController::class, 'get'])->middleware('auth.check');
    Route::delete('/{draft}', [DraftController::class, 'delete'])->middleware('auth.check');
});
