<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Article;
use App\Models\Articlecategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.articles.index', [
            'articles' => Article::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin.articles.create', [
            'articlecategories' => Articlecategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles',
            'articlecategory_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required|min:100'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('article-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '..');

        Article::create($validateData);

        Alert::success('Congrats', 'New Article has been added!');
        
        return redirect('/dashboard/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('dashboardAdmin.articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('dashboardAdmin.articles.edit', [
            'article' => $article,
            'articlecategories' => Articlecategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $rules = [
            'title' => 'required|max:255',
            'articlecategory_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required|min:100'
        ];

        if ($request->slug != $article->slug) {
            $rules['slug'] = 'required|unique:articles';
        }

        $validateData = $request->validate($rules);

        if ($request->file('image')) {
            if ($article->image) {
                Storage::delete($article->image);
            }

            $validateData['image'] = $request->file('image')->store('article-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '..');

        Article::where('id', $article->id)->update($validateData);

        Alert::success('Congrats', 'Article has been uptaded!');

        return redirect('/dashboard/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ( $article->image ) {
            Storage::delete($article->image);
        }

        Article::destroy($article->id);

        Alert::success('Congrats', 'Articles Deleted!');

        return redirect('/dashboard/articles');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
