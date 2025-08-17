<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
