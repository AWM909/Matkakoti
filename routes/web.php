<?php

use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\PhotoController as AdminPhotoController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/prices', [RoomController::class, 'prices'])->name('prices');
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Admin pages (login required)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', fn () => redirect()->route('admin.rooms.index'))->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('rooms', AdminRoomController::class)->except('show');
        Route::resource('photos', AdminPhotoController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('feedback', AdminFeedbackController::class)->only(['index', 'destroy']);
    });
});
