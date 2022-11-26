<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index(){
        return view('dashboard.article.data-article', [
            'articles' => Article::all()
        ]);
    }

    public function show(Article $article){
        return view('dashboard.article.show-article', [
            'articles' => $article
        ]);
    }

    public function showCategories(Category $category){
        return view('dashboard.article.articlecategory', [
            'title' => $category->name,
            'articles' => $category->articles,
            'articlecategory' => $category->name,
        ]);
    }}
