<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles=Article::orderBy('id','DESC')->paginate(5);
        //return view('article.index');
        return view('backup.home',compact('articles'));
    }
}
