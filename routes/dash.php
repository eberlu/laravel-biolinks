<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])
->prefix('/dash')
->namespace('App\Actions\Dash')
->group(function() {

    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::prefix('/profile')
    ->name('profile.')
    ->namespace('Profile')
    ->group(function() {

        Route::get('/', GetProfile::class)->name('edit');

    });

    Route::prefix('/links')
    ->name('links.')
    ->namespace('Profile\Links')
    ->group(function() {
        Route::get('/', IndexLinks::class)->name('index');
        Route::post('/', StoreLink::class)->name('store');
    });

});