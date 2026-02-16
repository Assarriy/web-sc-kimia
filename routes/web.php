<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('coach')) {
            return redirect('/admin');
        }

        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:coach'])->group(function () {
    Route::get('/coach', function () {
        return view('coach.dashboard');
    })->name('coach.home');
});

Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member', function () {
        return view('member.dashboard');
    })->name('member.home');
});

require __DIR__.'/auth.php';
