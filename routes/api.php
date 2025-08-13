<?php

use App\Http\Controllers\dnaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'message' => 'Mutacion de ADN :D',], 200);
});

Route::get('/mutation', [dnaController::class, 'mutation_stats']);
Route::post('/mutation', [dnaController::class, 'isMutation']);
Route::get('/mutation/list', [dnaController::class, 'mutation_list']);


/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');  */
