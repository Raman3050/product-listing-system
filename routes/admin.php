<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');


// Route::get('/', function () {
//     return view('admin.dashboard.index');
// })->name('dashboard');