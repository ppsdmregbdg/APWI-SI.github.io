<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Video;
use App\Models\Articlecategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.videos.index', [
            'videos' => Video::orderBy('title', 'asc')->paginate(10)
        ]);
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin.videos.create', [
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
            'link' => 'required|max:255'
        ]);

        Video::create($validateData);

        Alert::success('Congrats', 'New Video has been added!');
        
        return redirect('/dashboard/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('dashboardAdmin.videos.edit', [
            'video' => $video,
            'articlecategories' => Articlecategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'title' => 'required|max:255',
            'articlecategory_id' => 'required',
            'link' => 'required|max:255'
        ];

        if ($request->slug != $video->slug) {
            $rules['slug'] = 'required|unique:videos';
        }

        $validateData = $request->validate($rules);

        Video::where('id', $video->id)->update($validateData);

        Alert::success('Congrats', 'Video has been uptaded!');

        return redirect('/dashboard/videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Video::destroy($video->id);

        Alert::success('Congrats', 'Videos Deleted!');

        return redirect('/dashboard/videos');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Modul::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
