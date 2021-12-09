<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', 'verified'])->get('/dash', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');