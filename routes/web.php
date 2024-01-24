<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
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
Route::get('contact', [PagesController::class, 'getContact']);

Route::get('about', [PagesController::class, 'getAbout']);

Route::get('/', [PagesController::class, 'getIndex']);

Route::resource('posts', PostController::class);