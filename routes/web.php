<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    // Only with user if there is a logged in user
    return view('home')->with('user', Auth::check() ? Auth::user() : null)
        ->with('posts', Post::all());

})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/me', function () {
        return view('User.controlPanel')->with('user', Auth::user());
    })->name('controlPanel');


    Route::get('/addPost', [PostController::class, 'create'])->name('addPost');
    Route::post('/addPost', [PostController::class, 'store']);

    Route::name('userEdit.')->prefix('userEdit')->group(function () {

        Route::put('/changeInfo/{id}', [UserController::class, 'updateInfo'])->name('updateInfo');
        Route::put('/changePassword/{id}', [UserController::class, 'updatePassword'])->name('updatePassword');
        Route::put('/changeImg/{id}', [UserController::class, 'updateImage'])->name('updateImage');

        Route::delete('/deleteUser/{id}', [UserController::class, 'delete'])->name('delete');


    });

    Route::name('post.')->prefix('post')->group(function () {

        Route::delete('/{id}/delete', [PostController::class, 'delete'])->name('delete');

        Route::post('/{id}/like', [LikeController::class, 'like'])->name('like');
        Route::get('/{id}/like', [LikeController::class, 'likeGuest'])->name('likeGuest');

        Route::post('/{id}/dislike', [LikeController::class, 'dislike'])->name('dislike');
        Route::get('/{id}/dislike', [LikeController::class, 'dislikeGuest'])->name('dislikeGuest');


        Route::post('/{id}/addComment', [CommentController::class, 'store'])->name('addComment');
        Route::get('/{id}/addComment', [CommentController::class, 'store']);

        Route::delete('/comment/{id}/delete', [CommentController::class, 'delete'])->name('deleteComment');

    });


    Route::get('/likedPosts', [UserController::class, 'likedPosts'])->name('likedPosts');
    Route::get('/myPosts', [UserController::class, 'userPosts'])->name('userPosts');



});

Route::post('/addComment', [CommentController::class, 'showPartial'])->name('showPartialComment');

Route::get('/search', [PostController::class, 'search'])->name('search');