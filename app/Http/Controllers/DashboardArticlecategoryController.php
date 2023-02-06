<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Modul;
use App\Models\Video;
use App\Models\Articlecategory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Alert;

class DashboardArticlecategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.articlecategories.index', [
            'articlecategories' => Articlecategory::orderBy('name', 'asc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin.articlecategories.create');
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
            'name' => 'required|max:255|unique:articlecategories',
            'slug' => 'required|unique:articlecategories',
        ]);

        Articlecategory::create($validateData);

        Alert::success('Congrats', 'New article category has been added!');

        return redirect('/dashboard/articlecategories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function show(Articlecategory $articlecategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Articlecategory $articlecategory)
    {
        return view('dashboardAdmin.articlecategories.edit', [
            'articlecategory' => $articlecategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articlecategory $articlecategory)
    {
        if($request->name != $articlecategory->name){
            $rules['name'] = 'required|unique:articlecategories';
        }

        if($request->slug != $articlecategory->slug){
            $rules['slug'] = 'required|unique:articlecategories';
        }

        $validateData = $request->validate($rules);

        Articlecategory::where('id', $articlecategory->id)->update($validateData);

        Alert::success('Congrats', 'Article category has been updated!');

        return redirect('/dashboard/articlecategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articlecategory  $articlecategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articlecategory $articlecategory)
    {
        $articlecategoryId = $articlecategory->id;

        $articles = Article::where('articlecategory_id', '=', $articlecategoryId);
        $modul = Modul::where('articlecategory_id', '=', $articlecategoryId);
        $video = Video::where('articlecategory_id', '=', $articlecategoryId);

        $articles->delete();
        $modul->delete();
        $video->delete();

        Articlecategory::destroy($articlecategory->id);
        
        Alert::success('Congrats', 'Article category has been deleted!');
        
        return redirect('/dashboard/articlecategories');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Articlecategory::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
