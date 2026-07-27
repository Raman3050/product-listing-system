<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyCategoryController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\LocationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');


Route::resource(
    'property-categories',
    PropertyCategoryController::class
);

Route::resource(
    'property-types',
    PropertyTypeController::class
);

Route::resource(
    'locations',
    LocationController::class
);