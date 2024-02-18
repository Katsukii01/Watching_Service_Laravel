<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ChangeNameController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AnimeUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ComController;
use App\Http\Controllers\WatchedController;
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

Auth::routes();

Route::resource('comments', CommentController::class);
Route::resource('users', UsersController::class);
Route::get('users/{user}', [UsersController::class, 'update'])->name('users.update');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::get('/pfpchange', function () {
    return view('pfpchange');
});

Route::resource('/watched', WatchedController::class);

Route::post('/upload', [PhotoController::class, 'upload'])->name('upload');

Route::get('/namechange', [ChangeNameController::class, 'showForm'])->name('change-name.show');
Route::post('/namechange', [ChangeNameController::class, 'update'])->name('change-name.update');

Route::get('/passchange', [ChangePasswordController::class, 'showForm'])->name('change-password.show');
Route::post('/passchange', [ChangePasswordController::class, 'update'])->name('change-password.update');


Route::get('/anime/create', [AnimeController::class, 'create'])->name('anime.create');
Route::post('/anime', [AnimeController::class, 'store']);
Route::get('/anime/edit/{id}', [AnimeController::class, 'edit'])->name('anime.edit');
Route::put('/anime/update/{id}', [AnimeController::class, 'update'])->name('anime.update');
Route::delete('/anime/delete/{id}', [AnimeController::class, 'destroy'])->name('anime.destroy');
Route::resource('/anime', AnimeController::class);
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');

Route::post('/anime/{id}/markAsWatched', [AnimeUserController::class, 'markAsWatched'])->name('anime.markAsWatched');
Route::post('/anime/{id}/unmarkAsWatched', [AnimeUserController::class, 'unmarkAsWatched'])->name('anime.unmarkAsWatched');

Route::post('/anime/{animeId}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{commentId}/like', [CommentController::class, 'like'])->name('comments.like');
Route::post('/comments/{commentId}/dislike', [CommentController::class, 'dislike'])->name('comments.dislike');

Route::post('/like/{id}', [AnimeController::class, 'like'])->name('anime.like');
Route::post('/dislike/{id}', [AnimeController::class, 'dislike'])->name('anime.dislike');

Route::delete('/comment/{id}', [ComController::class, 'destroy'])->name('comment.destroy');


Route::get('/deleteaccount', [AccountController::class, 'showDeleteForm'])->name('delete.account.form');
Route::delete('/deleteaccount', [AccountController::class, 'deleteAccount'])->name('delete.account');