<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CatalogController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::view('/contact', 'frontend.contact.index')->name('contact');
Route::view('/new-launch', 'frontend.new-launch.index')->name('new-launch');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::get('/login-test', function () {
    return view('admin.auth.login');
});

// Route::get('/', function () {
//     return 'Frontend Home';
// });

Route::get('/dashboard', function () {
    return 'Admin Dashboard';
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Dynamic builder, project & unit routes (Keep at bottom)
Route::get('/{builder_slug}', [CatalogController::class, 'builderShow'])
    ->where('builder_slug', '^(?!admin)[^/]+$')
    ->name('catalog.builder.show');

Route::get('/{builder_slug}/{project_slug}', [CatalogController::class, 'projectShow'])
    ->where('builder_slug', '^(?!admin)[^/]+$')
    ->name('catalog.show');

Route::get('/{builder_slug}/{project_slug}/{unit_slug}', [CatalogController::class, 'unitShow'])
    ->where('builder_slug', '^(?!admin)[^/]+$')
    ->name('catalog.unit.show');
