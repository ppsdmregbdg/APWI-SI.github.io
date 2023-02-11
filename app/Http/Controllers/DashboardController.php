<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Modul;
use App\Models\Video;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.index', [
            'articles' => Article::all(),
            'moduls' => Modul::all(),
            'videos' => Video::all(),
            'admins' => User::where('id', '!=', '1')->get()
        ]);
    }
}
