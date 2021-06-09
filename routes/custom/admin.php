<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

//admin routes only

Route::prefix('admin')
    ->middleware(['auth'])
    ->namespace('Admin')
    ->group(function(){

      Route::resource('post', '\App\Http\Controllers\Admin\PostController');
      Route::resource('category', '\App\Http\Controllers\Admin\CategoryController');
      Route::resource('user', '\App\Http\Controllers\Admin\UserController');

      Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index');


    });




?>