<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Models\News;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;

/* --- Halaman Publik SC Kimia --- */

Route::get('/', function () {
    return view('index', [
        'news' => News::where('is_published', true)->latest()->take(3)->get(),
        'featured_galleries' => Gallery::where('is_featured', true)->latest()->take(6)->get(),
    ]);
})->name('home');

Route::get('/news', function () {
    return view('news.index', ['news' => News::where('is_published', true)->latest()->paginate(9)]);
})->name('news.index');

Route::get('/news/{slug}', function ($slug) {
    return view('news.show', ['item' => News::where('slug', $slug)->firstOrFail()]);
})->name('news.show');

Route::get('/gallery', function () {
    return view('gallery.index', [
        'featured' => Gallery::where('is_featured', true)->latest()->get(),
        'all_galleries' => Gallery::latest()->paginate(12)
    ]);
})->name('gallery.index');

Route::get('/about', function () {
    return view('about'); })->name('about');
Route::post('/about/send', [ContactController::class, 'store'])->name('contact.store');

/* --- Rute Autentikasi --- */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

require __DIR__ . '/auth.php';