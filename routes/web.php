<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\FrontController::class, 'blog'])->name('blog');

Route::get('/blog-post/{id}',[App\Http\Controllers\FrontController::class, 'blogPost'])->name('blog-post');

Route::get('blog-categories/{category_id}',[App\Http\Controllers\FrontController::class, 'blogCategory'])->name('blog.categories');

Route::group(['middleware'=>['auth','role:Super Admin|Admin'],'prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->middleware('role:Super Admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
