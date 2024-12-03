<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

// Public Routes
Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('services', [ServiceController::class, 'index'])->name('services');
Route::get('services/{id}', [ServiceController::class, 'showService'])->name('services.show');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');
Route::middleware('auth')->group(function () {


    Route::prefix('adminservices')->name('adminservices.')->group(function () {
        Route::get('/', [ServiceController::class, 'show'])->name('index');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::patch('/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('toggleStatus');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/',  [BlogController::class, 'show'])->name('index');
    });

    Route::get('/dashboard', function () {
        return view('admindashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
