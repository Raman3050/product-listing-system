<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyCategoryController;
use App\Http\Controllers\Admin\PropertyTypeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\BuilderController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectImageController;
use App\Http\Controllers\Admin\UnitController;
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

Route::resource(
    'builders',
    BuilderController::class
);

Route::resource(
    'amenities',
    AmenityController::class
);

Route::resource(
    'projects',
    ProjectController::class
);

Route::get(
    'project-images',
    [ProjectImageController::class, 'index']
)->name('project-images.index');

Route::post(
    'project-images',
    [ProjectImageController::class, 'store']
)->name('project-images.store');

Route::delete(
    'project-images/{projectImage}',
    [ProjectImageController::class, 'destroy']
)->name('project-images.destroy');

Route::resource(
    'units',
    UnitController::class
);