<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\category;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }
    public function index()
    {
        $articles=Article::orderBy('id','DESC')->paginate(5);
        //return view('article.index');
        return view('backup.home1',compact('articles'));
    }

}
