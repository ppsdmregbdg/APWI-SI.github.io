<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\ArticleCategory;

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

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

Route::get('/articlecategories/{article:slug}', function (ArticleCategory $articlecategory){
    return view('dashboard.article.articlecategories', [
        'articles' => $articlecategory->articles,
        'articlecategory' => $articlecategory->name
    ]);
});