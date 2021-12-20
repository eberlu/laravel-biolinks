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
            Route::put('/', UpdateProfile::class)->name('update');
    
        });
    
        Route::prefix('/links')
        ->name('links.')
        ->namespace('Profile\Links')
        ->group(function() {
            Route::get('/create', function(){
                return Inertia::render('Links/Create');
            })->name('create');
            Route::get('/', IndexLinks::class)->name('index');
            Route::post('/', StoreLink::class)->name('store');
            Route::delete('/{id}', DestroyLink::class)->name('destroy');
            Route::get('/{id}', EditLink::class)->name('edit');
            Route::put('/{id}', UpdateLink::class)->name('update');
        });
    });

    Route::namespace('App\Http\Controllers\Dash')
    ->group(function() {
        Route::get('/account', 'AccountController@show')->name('account');
    });
});

Route::get('user/profile', function(){
    return redirect()->route('account');
})->name('profile.show');

