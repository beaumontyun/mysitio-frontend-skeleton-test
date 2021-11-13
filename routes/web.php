<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImagesController;
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

Route::get('/', function () {
    return redirect()->route('posts');
});

// Blog posts
Route::get('/posts', [BlogController::class, 'index'])
    ->name('posts');

Route::get('/posts/{post}', [BlogController::class, 'show'])
    ->name('posts.show');

Route::put('/posts/{post}', [BlogController::class, 'update'])
    ->name('posts.update');

Route::delete('/posts/{post}', [BlogController::class, 'destroy'])
    ->name('posts.destroy');

// Market
Route::get('/market', function () {
    return Inertia::render('Market/Index');
})->name('market');

// Add posts
Route::get('/add', function () {
    return Inertia::render('AddContent/Index');
})->name('add');

Route::post('/add', [BlogController::class, 'store'])
    ->name('add.store');

// Message
Route::get('/message', function () {
    return Inertia::render('Message/Index');
})->name('message');

// Profile
Route::get('/profile', function () {
    return Inertia::render('Profile/Index');
})->name('profile');

// Image paths
Route::get('/img/{path}', [ImagesController::class, 'show'])
->where('path', '.*')    
->name('image');