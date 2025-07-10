<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Admin Controller
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController; 
use App\Http\Controllers\Admin\PostController; 

//public Controller
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class, 'index']) ->name('home');

Route::get('/search', [HomeController::class, 'search']);


Route::get('/article/{id}', [HomeController::class, 'article'])->name('article'); // Route for viewing a specific article
Route::get('/login', [AuthController::class, 'login'])->name('login'); // Route for the login page
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate'); // Route for handling authentication
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Route for handling logout

Route::prefix('Admin')->middleware('auth')->group(function(){
    Route::get('/Category', [CategoryController::class, 'index'])->name('Admin.Category.index');
    Route::get('/Category/create', [CategoryController::class, 'create'])->name('Admin.Category.create');
    Route::post('/Category/store', [CategoryController::class, 'store'])->name('Admin.Category.store');

    Route::get('/Category/edit/{id}', [CategoryController::class, 'edit'])->name('Admin.Category.edit');
    Route::put('/Category/update/{id}', [CategoryController::class, 'update'])->name('Admin.Category.update');
    Route::delete('/Category/delete/{id}', [CategoryController::class, 'delete'])->name('Admin.Category.delete');

    Route::get('/tag', [TagController::class, 'index'])->name('Admin.tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('Admin.tag.create');
    Route::post('/tag/store', [TagController::class, 'store'])->name('Admin.tag.store');

    Route::get('/tag/edit/{id}', [TagController::class, 'edit'])->name('Admin.tag.edit');
    Route::put('/tag/update/{id}', [TagController::class, 'update'])->name('Admin.tag.update');
    Route::delete('/tag/delete/{id}', [TagController::class, 'delete'])->name('Admin.tag.delete');

    Route::get('/post', [PostController::class, 'index'])->name('Admin.post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('Admin.post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('Admin.post.store');

    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('Admin.post.edit');
    Route::put('/post/update/{id}', [PostController::class, 'update'])->name('Admin.post.update');
    Route::delete('/post/delete/{id}', [PostController::class, 'delete'])->name('Admin.post.delete');
}); 