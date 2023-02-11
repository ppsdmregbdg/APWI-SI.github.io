<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElearningController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardModulController;
use App\Http\Controllers\DashboardVideoController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\DashboardArticlecategoryController;

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
    return view('dashboard.landing-page.landing', [
        'recentarticles' => Article::latest()->paginate(3)
    ]);
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

Route::group(['middleware' => 'auth'], function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Check-slug
    Route::get('/dashboard/articles/checkSlug', [DashboardArticleController::class, 'checkSlug']);
    Route::get('/dashboard/articlecategories/checkSlug', [DashboardArticlecategoryController::class, 'checkSlug']);

    //Menu
    Route::resource('/dashboard/articles', DashboardArticleController::class);
    Route::resource('/dashboard/articlecategories', DashboardArticlecategoryController::class)->except('show');
    Route::resource('/dashboard/moduls', DashboardModulController::class)->except('show');
    Route::resource('/dashboard/admins', DashboardAdminController::class);
    Route::resource('/dashboard/videos', DashboardVideoController::class);

    //Change-password
    Route::get('/dashboard.admins.editPassword', [ChangePasswordController::class, 'index']);
    Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');
});