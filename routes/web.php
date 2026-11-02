<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;

// Halaman awal untuk Guest
Route::get('/', [GuestController::class, 'index'])->name('home'); 

// Route untuk pengumuman khusus guest
Route::get('/pengumuman', [AnnouncementController::class, 'indexGuest'])->name('guest.index');

// Route untuk News khusus guest
Route::get('/berita', [NewsController::class, 'indexGuest'])->name('guest.news.index');
Route::get('/berita/{slug}', [NewsController::class, 'showGuest'])->name('guest.news.show');

// Route untuk Gallery khusus guest
Route::get('/galeri', [GalleryController::class, 'indexGuest'])->name('guest.galleries.index');
Route::get('/galeri/{gallery}', [GalleryController::class, 'showGuest'])->name('guest.galleries.show');

// Route untuk Kontak khusus guest
Route::get('/kontak', [ContactController::class, 'indexGuest'])->name('guest.contacts.index');

// Route untuk unduh file pengumuman
Route::get('/download/{filename}', function ($filename) {
    // Tambahkan folder 'announcements/' secara otomatis ke file path
    $filePath = storage_path('app/public/' . $filename);

    // Periksa apakah file ada
    if (!file_exists($filePath)) {
        abort(404, 'File not found: ' . $filePath);
    }

    // Unduh file
    return response()->download($filePath, basename($filePath), [
        'Content-Type' => mime_content_type($filePath),
    ]);
})->where('filename', '.*')->name('download.file');

// Route baru untuk template Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // Menampilkan file resources/views/admin/dashboard.blade.php
})->name('admin.dashboard');

// Route baru untuk template Guest
Route::get('/guest/home', function () {
    return view('guest.home'); // Menampilkan file resources/views/guest/home.blade.php
})->name('guest.home');

// Route untuk autentikasi (gunakan fitur bawaan Laravel)
Auth::routes();

// Route untuk admin (dilindungi middleware auth)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Resource routes untuk Profile (CRUD)
    Route::resource('profiles', ProfileController::class);

    // Resource routes untuk Announcement (CRUD)
    Route::resource('announcements', AnnouncementController::class);

    // Resource routes untuk News (CRUD)
    Route::resource('news', NewsController::class);

    // Resource routes untuk Gallery (CRUD)
    Route::resource('galleries', GalleryController::class);

    // Resource routes untuk Contacts (CRUD)
    Route::resource('contacts', ContactController::class);
});
