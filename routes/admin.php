<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertyCategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');


Route::resource(
    'property-categories',
    PropertyCategoryController::class
);
// Route::get('/', function () {
//     return view('admin.dashboard.index');
// })->name('dashboard');