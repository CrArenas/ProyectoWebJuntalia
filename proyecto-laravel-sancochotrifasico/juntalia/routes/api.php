<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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


Route::apiResource('users', UserController::class);

Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/events/chart', [EventController::class, 'eventsChart']);
    Route::get('/inscriptions/chart', [InscriptionController::class, 'inscriptionsChart']);
});



Route::get('/eventos/cercanos', [EventController::class, 'obtenerEventosCercanos']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
