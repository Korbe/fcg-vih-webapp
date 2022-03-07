<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('public.')->group(function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/events', [HomeController::class, 'events'])->name('events');
    Route::get('/donate', [HomeController::class, 'donate'])->name('donate');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

    Route::get('/impressum', [HomeController::class, 'impressum'])->name('impressum');
    Route::get('/datenschutz', [HomeController::class, 'datenschutz'])->name('datenschutz');

});

Route::name('dashboard.')->middleware(['auth:sanctum', 'verified'])->group(function () {


    Route::get("dashboard", [DashboardController::class, 'index'])->name('home');


    Route::resource("posts", PostController::class)->except("show");
    Route::post("posts/{post}/audio", [PostController::class, 'updateAudio'])->name('posts.audio');

});


Route::fallback(function () {
    return Inertia::render('PageNotFound');
});

