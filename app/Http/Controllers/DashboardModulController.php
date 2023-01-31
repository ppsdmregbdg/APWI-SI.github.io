<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Modul;
use App\Models\Articlecategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardModulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboardAdmin.moduls.index', [
            'moduls' => Modul::orderBy('title', 'asc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboardAdmin.moduls.create', [
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
            'file' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx'
        ]);

        $validateData['file'] = $request->file('file')->store('modul-files');

        Modul::create($validateData);

        Alert::success('Congrats', 'New Modul has been added!');
        
        return redirect('/dashboard/moduls');
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
    public function edit(Modul $modul)
    {
        return view('dashboardAdmin.moduls.edit', [
            'modul' => $modul,
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
    public function update(Request $request, Modul $modul)
    {
        $rules = [
            'title' => 'required|max:255',
            'articlecategory_id' => 'required',
            'file' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx'
        ];

        if ($request->slug != $modul->slug) {
            $rules['slug'] = 'required|unique:moduls';
        }

        $validateData = $request->validate($rules);

        if ($request->file('file')) {
            if ($modul->file) {
                Storage::delete($modul->file);
            }

            $validateData['file'] = $request->file('file')->store('modul-files');
        }

        Modul::where('id', $modul->id)->update($validateData);

        Alert::success('Congrats', 'Modul has been uptaded!');

        return redirect('/dashboard/moduls');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modul $modul)
    {
        if ( $modul->file ) {
            Storage::delete($modul->file);
        }

        Modul::destroy($modul->id);

        Alert::success('Congrats', 'Moduls Deleted!');

        return redirect('/dashboard/moduls');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Modul::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
