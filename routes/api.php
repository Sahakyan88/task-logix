<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/sign-up', [UserController::class, 'signUp'])->name('signUp');
Route::post('/sign-in', [UserController::class, 'signIn'])->name('signIn');


Route::get('/articles/search', [ArticleController::class, 'search'])->name('article-search');
Route::post('/articles/toggleLike', [UserController::class, 'toggleLike'])->name('toggle-like');
Route::post('users/comment', [UserController::class, 'userComment'])->name('users-comment');


