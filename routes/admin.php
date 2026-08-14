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
use App\Http\Controllers\Admin\UnitImageController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UnitFeatureController;
use App\Http\Controllers\Admin\ProjectPageDetailController;
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

Route::resource('project-images', ProjectImageController::class)
    ->only([
        'index',
        'store',
        'destroy'
    ]);

Route::resource(
    'units',
    UnitController::class
);

Route::resource('unit-images', UnitImageController::class)
    ->only([
        'index',
        'store',
        'destroy'
    ]);

Route::resource(
    'tenants',
    TenantController::class
);

Route::resource(
    'unit-features',
    UnitFeatureController::class
);

Route::resource(
    'project-page-details',
    ProjectPageDetailController::class
);