<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\FoodController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('category', CategoryController::class);
Route::apiResource('food', FoodController::class);
