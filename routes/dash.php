<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])
->prefix('/dash')
->group(function() {

    Route::namespace('App\Actions\Dash')
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
            Route::get('/{take?}', IndexLinks::class)->name('index');
            Route::post('/', StoreLink::class)->name('store');
        });
    });

    Route::namespace('App\Http\Controllers\Dash')
    ->group(function() {
        Route::get('/account', 'AccountController@show')->name('account');
    });
});

