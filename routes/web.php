<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return Redirect::to(\route('customer.index'));
});

Route::resource('customer',\App\Http\Controllers\CustomerController::class);
Route::resource('movie',\App\Http\Controllers\MovieController::class);
Route::resource('genre',\App\Http\Controllers\GenreController::class);
Route::resource('membershipType',\App\Http\Controllers\MembershipTypeController::class);
Route::resource('register',\App\Http\Controllers\RegisterController::class);
