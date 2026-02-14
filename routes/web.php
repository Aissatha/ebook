<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EbookController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ✅ Admin (sans Kernel) -> on utilisera un Gate: access-admin
    Route::middleware(['can:access-admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::resource('categories', CategoryController::class);
            Route::resource('ebooks', EbookController::class);
        });
});
