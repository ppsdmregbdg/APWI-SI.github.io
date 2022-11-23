<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/blog', function () {
    return view('dashboard.blog.layouts.master-blog');
});

Route::get('/blog-details', function () {
    return view('dashboard.blog.show-blog');
});