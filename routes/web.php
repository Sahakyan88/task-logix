<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmailChangeController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

//                                PROFILE ROUTES GENERATED BY PACKAGE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//                                EMAIL UPDATE ROUTES
    Route::get('/email/change', [EmailChangeController::class, 'showForm'])->name('email-change');
    Route::post('/email/change', [EmailChangeController::class, 'initiate'])->name('email-change-initiate');
    Route::get('/email/change/confirm/{code}', [EmailChangeController::class, 'showConfirmationForm'])->name('email-change-confirm');
    Route::post('/email/change/confirm', [EmailChangeController::class, 'confirm'])->name('email-change-confirmation');

//                                ARTICLE POST ROUTES
    Route::post('/users/comment', [UserController::class, 'userComment'])->name('users-comment');
    Route::post('/articles/toggleLike', [UserController::class, 'toggleLike'])->name('toggle-like');
});

require __DIR__ . '/auth.php';

//                               ARTICLE ROUTES
Route::get('/articles', [ArticleController::class, 'article'])->name('article-page');
Route::post('/articles/new', [ArticleController::class, 'create'])->name('article-create');

