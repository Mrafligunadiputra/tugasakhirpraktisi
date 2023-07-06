<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Article;


class HomeController extends Controller
{
    //
    public function home(){
        
        $articles=Article::inRandomOrder()->orderBy('id','DESC')->paginate(5);
        return view('home',compact('articles'));
    }
}
