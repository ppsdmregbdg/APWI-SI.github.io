<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Articlecategory;

class ArticleController extends Controller
{
    public function index(){
        $title = '';
        if(request('articlecategory')){
            $articlecategory = Articlecategory::firstWhere('slug', request('articlecategory'));
            $title = ' in ' . $articlecategory->name;
        }
        return view('dashboard.article.data-article', [
            'title' => "All Article $title",
            'articles' => Article::latest()->filter(request(['search', 'articlecategory']))->paginate(5)->withQueryString()
        ]);
    }

    public function show(Article $article){
        return view('dashboard.article.show-article', [
            'article' => $article
        ]);
    }
}
