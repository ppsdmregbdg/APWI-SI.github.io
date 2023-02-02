<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ElearningController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\DashboardArticlecategoryController;
use App\Http\Controllers\DashboardModulController;
use App\Http\Controllers\DashboardVideoController;

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

Route::get('/', function () {
    return view('dashboard.landing-page.landing');
});

// artikel
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

// elearning
Route::get('/elearnings', [ElearningController::class, 'index']);
Route::get('/videos', [ElearningController::class, 'indexVideo']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboardAdmin.index');
})->middleware('auth');

//Check-slug
Route::get('/dashboard/articles/checkSlug', [DashboardArticleController::class, 'checkSlug']);
Route::get('/dashboard/articlecategories/checkSlug', [DashboardArticlecategoryController::class, 'checkSlug']);

Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('auth');
Route::resource('/dashboard/articlecategories', DashboardArticlecategoryController::class)->middleware('auth')->except('show');
Route::resource('/dashboard/moduls', DashboardModulController::class)->middleware('auth')->except('show');
Route::resource('/dashboard/videos', DashboardVideoController::class)->middleware('auth');
