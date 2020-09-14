<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('pet', PetController::class);
