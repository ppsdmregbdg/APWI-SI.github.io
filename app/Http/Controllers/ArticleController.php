<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        return view('dashboard.article.layouts.master-article', [
            'articles' => Article::all()
        ]);
    }

    public function show(Article $article){
        return view('dashboard.article.show-article', [
            'article' => $article
        ]);
    }
}
