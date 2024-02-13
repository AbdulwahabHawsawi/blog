<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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
Route::get('blog/{slug}', [BlogController::class, 'getSingle'])->name('blog.single')->where('slug','[\w\d\_\-]+');

Route::get('blog', [BlogController::class, 'getIndex'])->name('blog.index');

Route::get('contact', [PagesController::class, 'getContact']);
Route::post('contact', [PagesController::class, 'postContact']);

Route::get('about', [PagesController::class, 'getAbout']);

Route::get('/', [PagesController::class, 'getIndex'])->name('index');

Route::resource('posts', PostController::class);

//Authentication
Route::get('auth/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('auth/login', [AuthController::class, 'postLogin']);
Route::post('auth/logout', [AuthController::class, 'postLogout'])->name('logout');

//Registration
Route::get('auth/register', [AuthController::class, 'getRegister'])->name('register');
Route::post('auth/register', [AuthController::class, 'postRegister']);

//Password Reset
Route::get('/forgot-password', [PasswordController::class, 'getForgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [PasswordController::class, 'postForgotPassword'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordController::class, 'getResetPassword'])->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'postResetPassword'])->name('password.update');

//categories
Route::resource('categories', CategoryController::class, ['except' => ['create']]);

//tags
Route::resource('tags', TagController::class, ['except' => ['create']]);

//comments
Route::post('comments/{post_id}', [CommentController::class, 'postComment'])->name('comments.post');
Route::get('comments/{comment_id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::PUT('comments/{comment_id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('confirm-delete/{comment_id}', [CommentController::class, 'confirmDelete'])->name('comments.delete');
Route::delete('comments/{comment_id}/destroy', [CommentController::class, 'destroy'])->name('comments.destroy');