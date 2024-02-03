<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
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