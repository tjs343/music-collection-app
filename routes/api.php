<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Album;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;

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

Route::get("/test-me", function () {
    return 'Hello from Laravel!!!';
});

Route::get("/albums", [AlbumController::class, 'index']);

//Route::get("/artist/{id}", [ArtistController::class, 'index']);

Route::get("/artists", [ArtistController::class, 'index']);

Route::get("/artist/{id}", function(){return 'hi';});