<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    // Route::get('images/{path}', [\App\Http\Controllers\ImageController::class, 'getImage'])->name('images.get');

    // cinema
    Route::resource('cinemas', \App\Http\Controllers\Dashboard\CinemaController::class);

    // genres
    Route::resource('genres', \App\Http\Controllers\Dashboard\GenreController::class);

    // theaters
    Route::resource('theaters', \App\Http\Controllers\Dashboard\TheaterController::class);

    // blogs
    Route::resource('blogs', \App\Http\Controllers\Dashboard\BlogController::class);

    // movies
    Route::resource('movies', \App\Http\Controllers\Dashboard\MovieController::class);

    // crews
    Route::resource('crews', \App\Http\Controllers\Dashboard\CrewController::class);

    // users
    Route::resource('users', \App\Http\Controllers\Dashboard\UserController::class);

    // admins
    Route::resource('admins', \App\Http\Controllers\Dashboard\AdminController::class);

    // show times
    Route::resource('showtimes', \App\Http\Controllers\Dashboard\ShowTimeController::class);

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('welcome');
    });
});

require __DIR__.'/auth.php';
