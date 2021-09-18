<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\brandcontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\sunilcontroller;
use App\Http\Controllers\aboutcontroller;
use App\Models\brand;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/',[brandcontroller::class,'clients']);
Route::get('/',function(){
$post=DB::table('brands')->get();
$about=DB::table('homeabouts')->first();
return view('home',compact('post','about'));

});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/category/all',[categorycontroller::class,'allcat'])->name('all.category');
Route::post('/category/all',[categorycontroller::class,'addcat'])->name('store.category');
Route::get('/category/edit/{id}',[categorycontroller::class,'edit']);
Route::post('/category/edit/{id}',[categorycontroller::class,'update']);
Route::get('/softdelete/category/{id}',[categorycontroller::class,'softdelete']);
Route::get('/category/restore/{id}',[categorycontroller::class,'restore']);
Route::get('/category/delete/{id}',[categorycontroller::class,'delete']);
Route::get('/brand/all',[brandcontroller::class,'allbrand'])->name('all.brand');
Route::post('/brand/add',[brandcontroller::class,'storebrand'])->name('store.brand');
Route::get('/sunil/all',[sunilcontroller::class,'allsunil'])->name('all.sunil');
Route::post('/sunil/add',[sunilcontroller::class,'addsunil'])->name('add.sunil');
Route::get('/user/logout',[brandcontroller::class,'logout'])->name('user.logout');
Route::get('/brand/edit/{id}',[brandcontroller::class,'edit']);
Route::post('/brand/update/{id}',[brandcontroller::class,'update']);
Route::get('/brand/delete/{id}',[brandcontroller::class,'delete']);
Route::get('/home/slider/',[homecontroller::class,'index'])->name('slider');
Route::get('/add/slider/',[homecontroller::class,'addslider'])->name('add.slider');
Route::post('/store/slider/',[homecontroller::class,'storeslider'])->name('store.slider');
Route::get('/slider/edit/{id}',[homecontroller::class,'edit']);
Route::post('/slider/update/{id}',[homecontroller::class,'update']);

//home about route
Route::get('/home/about',[aboutcontroller::class,'homeabout'])->name('home.about');
Route::get('/add/about',[aboutcontroller::class,'addabout'])->name('add.about');
Route::post('/store/about',[aboutcontroller::class,'storeabout'])->name('store.about');
Route::get('/about/edit/{id}',[aboutcontroller::class,'editabout']);
Route::post('/update/homeabout/{id}',[aboutcontroller::class,'updateabout'])->name('store.update');
Route::get('/about/delete/{id}',[aboutcontroller::class,'deleteabout']);
