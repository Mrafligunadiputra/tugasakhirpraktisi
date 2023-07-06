<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){
        $articles=Article::inRandomOrder()->orderBy('id','DESC')->paginate(5);
        return view('welcome',compact('articles'));
    }
}
