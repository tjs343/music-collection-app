<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Album;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\StatsController;

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

Route::get("/stats", [StatsController::class, 'appStats']);

Route::get("/albums", [AlbumController::class, 'index']);

//Route::get("/artist/{id}", [ArtistController::class, 'index']);

Route::get("/artists", [ArtistController::class, 'index']);

Route::get("/artist/{id}", function(){return 'hi';});

Route::post('/album-create', [AlbumController::class, 'store']);

Route::get('/album-edit/{id}', [AlbumController::class, 'edit']);

Route::put('/album-update/{id}', [AlbumController::class, 'update']);

Route::delete('/album-delete/{id}', [AlbumController::class, 'destroy']);