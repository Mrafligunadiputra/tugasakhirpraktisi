<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\ArtisanController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin;
use Illuminate\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get('/',function(){
    return view('welcome');
});*/

Route::get('/',[WelcomeController::class,'index']);

//Route::get('/',[HomeController::class,'home']);
//Route::get('/home',[HomeController::class,'home']);

Route::get('/manage/article',[ArtisanController::class,'index'])->middleware('auth')->name('manage.article');
Route::get('/article/create',[ArtisanController::class,'create'])->middleware('auth')->name('article.create');
Route::post('/article/store',[ArtisanController::class,'store'])->middleware('auth')->name('article.store');
Route::get('/article/edit/{id}',[ArtisanController::class,'edit'])->middleware('auth')->name('article.edit');
Route::post('/article/update/{id}',[ArtisanController::class,'update'])->middleware('auth')->name('article.update');
Route::get('/article/delete/{id}',[ArtisanController::class,'destroy'])->middleware('auth')->name('article.delete');
Route::get('/article/detail2/{id}',[ArtisanController::class,'show'])->middleware('auth')->name('article.detail2');
Route::get('/article/detail/{id}',[ArtisanController::class,'show2'])->middleware('auth')->name('article.detail');
Route::post('/article/detail/{id}',[ArtisanController::class,'insertData'])->middleware('auth')->name('article.comment');
Route::post('/article/detail2/{id}',[ArtisanController::class,'insertData2'])->middleware('auth')->name('article.comment2');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/',[Admin\Auth\LoginController::class,'loginForm']);
    Route::get('/login',[Admin\Auth\LoginController::class,'loginForm'])->name('admin.login');
    Route::post('/login',[Admin\Auth\LoginController::class, 'login'])->name('admin.login');
    Route::get('/home',[Admin\HomeController::class,'index'])->name('admin.home');
    Route::get('/logout',[Admin\Auth\LoginController::class,'logout'])->name('admin.logout');
});