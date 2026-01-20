<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/contact', fn () => view('contact'));
Route::post('/contact', [ContactController::class, 'store']);
