<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Article;
use App\Models\Comment;
use Faker\Factory as Faker;




class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles=Article::orderBy('id','DESC')->paginate(5);
        //return view('article.index');
        return view('article.manage.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=category::get();
        return view('article.manage.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'category'=>'required',
            'title'=>'required|unique:articles|min:5|max:50',
            'content'=>'required|min:20|max:1000',
            
        ]);
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->storeAs('public',$fileName);
        $articles=Article::create([
            'category_id'=>$request->category,
            'title'=>$request->title,
            'content'=>$request->content,
            'file'=>$fileName,
        ]);


        /*$articles=New Article();
        $articles->category_id=$request->category;
        $articles->title=$request->title;
        $articles->content=$request->content;
        $articles->save();*/

        return back()->with('success','Posting data sukses!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $articles=Article::whereId($id)->first();
        $hasil = Article::find($id);
        $komen = Comment::all();
        return view('article.show',compact('articles','hasil','komen','id'));
    }
    public function insertData(Request $request, $id){
        $faker = Faker::create();
        $hasil = Article::find($id);
        $user = new Comment();
        $user->name = $request->nama;
        $user->comment = $request->komentar;
        $user->id_article = $request->id;
        $user->profile_photo = $faker->imageUrl($widht=50,$height=50);
        $user->save();
        return redirect()->route('article.detail2',['id'=>$id]);
    }
    public function show2(string $id)
    {
        //
        $articles=Article::whereId($id)->first();
        $hasil = Article::find($id);
        $komen = Comment::all();
        return view('article.show2',compact('articles','hasil','komen','id'));
    }
    public function insertData2(Request $request, $id){
        $faker = Faker::create();
        $hasil = Article::find($id);
        $user = new Comment();
        $user->name = $request->nama;
        $user->comment = $request->komentar;
        $user->id_article = $request->id;
        $user->profile_photo = $faker->imageUrl($widht=50,$height=50);
        $user->save();
        return redirect()->route('article.detail',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories=category::get();
        $articles=Article::find($id);

        return view('article.manage.edit',compact('categories','articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $articles=Article::whereId($id)->first();
        if(\File::exists('storage/'.$articles->file)){
            \File::delete('storage/'.$articles->file);
        }
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->storeAs('public',$fileName);
        $articles->update([
            'category_id'=>$request->category,
            'title'=>$request->title,
            'content'=>$request->content,
            'file'=>$fileName,
        ]);
        return back()->with('success','ubah data sukses!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $articles=Article::whereId($id)->first();
        if(\File::exists('storage/'.$articles->file)){
            \File::delete('storage/'.$articles->file);
        }
        Article::whereId($id)->delete();
        return back()->with('success','Hapus data sukses!');
    }
}
