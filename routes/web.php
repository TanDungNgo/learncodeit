<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\LogoutController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\BookmarkController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::get('admin/users/logout', [LogoutController::class, 'logout'])->name('logout');

#User
Route::group(['prefix' => 'admin/users', 'as' => 'user.'], function () {
    Route::get('/create', [RegisterController::class, 'create'])->name('create');
    Route::post('/store', [RegisterController::class, 'store'])->name('store');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/posts/list', [RatingController::class, 'Rating'])->name('posts.rating');
    Route::post('/comments/like', [CommentController::class, 'Like'])->name('comments.like');
    Route::post('/comments/dislike', [CommentController::class, 'Dislike'])->name('comments.dislike');
    #Bookmark
    Route::post('bookmark',[BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('bookmark/add',[BookmarkController::class, 'store'])->name('bookmark.store');
    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Posts
        Route::prefix('posts')->group(function () {
            Route::get('add', [PostController::class, 'create']);
            Route::post('add', [PostController::class, 'store']);
            Route::get('list', [PostController::class, 'index']);
            Route::get('edit/{post}', [PostController::class, 'show']);
            Route::post('edit/{post}', [PostController::class, 'update']);
            Route::DELETE('destroy', [PostController::class, 'destroy']);
        });


        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Comment
        Route::group(['prefix' => 'comments', 'as' => 'comment.'], function () {
            Route::post('/add', [CommentController::class, 'store'])->name('store');
        });
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('bai-viet/{id}-{slug}.html', [App\Http\Controllers\PostController::class, 'index']);
