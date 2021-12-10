<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])
->prefix('/dash')
->namespace('App\Http\Controllers\Dash')
->group(function() {

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('/profile')
    ->name('profile.')
    ->group(function() {
        Route::get('/', 'ProfileController@edit')->name('edit');
        Route::put('/', 'ProfileController@update')->name('update');
    });

    Route::prefix('/links')
    ->name('links.')
    ->group(function() {
        Route::resource('/', 'LinksController')->except('show');
    });
});