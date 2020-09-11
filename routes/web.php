<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/task', [TaskController::class, 'index']);
Route::get('/create', 'TaskController@index')->name('createTask');
Route::get('/modify', 'TaskController@index')->name('modifyTask');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
