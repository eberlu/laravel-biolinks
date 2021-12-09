<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])
->group(function() {

    Route::get('/dash', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    
});