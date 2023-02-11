<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Video;
use App\Models\Articlecategory;

class ElearningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if(request('articlecategory')){
            $articlecategory = Articlecategory::firstWhere('slug', request('articlecategory'));
            $title = ' in ' . $articlecategory->name;
        }
        return view('dashboard.elearning.data-elearning', [
            'title' => "E-Learning - Modul $title",
            'moduls' => Modul::latest()->filter(request(['search', 'articlecategory']))->paginate(5)->withQueryString(),

            'recentmoduls' => Modul::latest()->paginate(3),
            'recentarticlecategories' => Articlecategory::orderBy('name', 'asc')->get()
        ]);
    }

    public function indexVideo()
    {
        $title = '';
        if(request('articlecategory')){
            $articlecategory = Articlecategory::firstWhere('slug', request('articlecategory'));
            $title = ' in ' . $articlecategory->name;
        }
        return view('dashboard.elearning-video.data-elearning', [
            'title' => "E-Learning - Video $title",
            'videos' => Video::latest()->filter(request(['search', 'articlecategory']))->paginate(5)->withQueryString(),

            'recentvideos' => Video::latest()->paginate(3),
            'recentarticlecategories' => Articlecategory::orderBy('name', 'asc')->get()
        ]);
    }
}
