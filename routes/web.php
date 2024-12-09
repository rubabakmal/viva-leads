<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

// Public Routes
Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');
Route::get('/terms', function () {
    return view('terms');
})->name('terms');


Route::get('services', [ServiceController::class, 'index'])->name('services');
Route::get('services/{id}', [ServiceController::class, 'showService'])->name('services.show');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');
Route::post('/storeservice', [ServiceController::class, 'storeservicerequest'])->name('storeservicerequest');



Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/',  [BlogController::class, 'show'])->name('index');
    Route::get('/blog-detail/{id}', [BlogController::class, 'Blogdetail'])->name('blog_detail');
});


Route::post('/blog-detail/{id}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::middleware('auth')->group(function () {


    Route::prefix('adminservices')->name('adminservices.')->group(function () {
        Route::get('/', [ServiceController::class, 'show'])->name('index');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::patch('/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('toggleStatus');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('adminblogs')->name('adminblogs.')->group(function () {
        Route::get('/',  [BlogController::class, 'index'])->name('index');
        Route::post('/blogs/store', [BlogController::class, 'store'])->name('store');
        Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('update');
        Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('admincomments')->name('admincomments.')->group(function () {
        Route::get('/',  [CommentController::class, 'index'])->name('index');
        Route::delete('/admin/comments/{id}', [CommentController::class, 'destroy'])->name('destroy');
    });
    Route::get('/dashboard', function () {
        return view('admindashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
