<?php

use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\RobotsController;
use App\Http\Controllers\ServicePageController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Subdomain: services.armydogcenterpk.com
|--------------------------------------------------------------------------
*/
Route::domain(config('domains.services'))->name('services.')->group(function () {
    Route::get('/robots.txt', RobotsController::class)->name('robots');
    Route::get('/', [ServicePageController::class, 'index'])->name('index');
    Route::get('/{slug}', [ServicePageController::class, 'show'])
        ->where('slug', '^(?!robots\.txt$|sitemap.*\.xml$).*')
        ->name('show');
});

/*
|--------------------------------------------------------------------------
| Subdomain: blog.armydogcenterpk.com
|--------------------------------------------------------------------------
*/
Route::domain(config('domains.blog'))->name('blog.')->group(function () {
    Route::get('/robots.txt', RobotsController::class)->name('robots');
    Route::get('/', [BlogPageController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogPageController::class, 'show'])
        ->where('slug', '^(?!robots\.txt$|sitemap.*\.xml$).*')
        ->name('show');
});

/*
|--------------------------------------------------------------------------
| Subdomain: about.armydogcenterpk.com
|--------------------------------------------------------------------------
*/
Route::domain(config('domains.about'))->name('about.')->group(function () {
    Route::get('/robots.txt', RobotsController::class)->name('robots');
    Route::get('/', [StaticPageController::class, 'about'])->name('index');
});

/*
|--------------------------------------------------------------------------
| Subdomain: contact.armydogcenterpk.com
|--------------------------------------------------------------------------
*/
Route::domain(config('domains.contact'))->name('contact.')->group(function () {
    Route::get('/robots.txt', RobotsController::class)->name('robots');
    Route::get('/', [StaticPageController::class, 'contact'])->name('index');
});

/*
|--------------------------------------------------------------------------
| Root Domain: armydogcenterpk.com (and local fallback)
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', RobotsController::class)->name('robots');
Route::get('/', [StaticPageController::class, 'home'])->name('home');
