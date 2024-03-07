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

// Albun Routes
Route::get("/albums", [AlbumController::class, 'index']);

Route::post('/album-create', [AlbumController::class, 'store']);

Route::get('/album-edit/{id}', [AlbumController::class, 'edit']);

Route::put('/album-update/{id}', [AlbumController::class, 'update']);

Route::delete('/album-delete/{id}', [AlbumController::class, 'destroy']);

// Artist Route
Route::get("/artists", [ArtistController::class, 'index']);