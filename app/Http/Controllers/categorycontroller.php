<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Auth;
use Illuminate\Support\Carbon;

class categorycontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    public function allcat()
    {
        $categories=category::latest()->paginate(2);
        $trashdata=category::onlyTrashed()->latest()->paginate(2);
        return view('admin.category.index',compact('categories','trashdata'));
    }
    public function addcat(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ],
        [
            'category_name.required' => 'Please fill'
        ]);
    category::insert([
        'category_name'=>$request->category_name,
        'user_id'=>Auth::user()->id,
        'created_at'=>Carbon::now()
    ]);
    return back();
    }
    public function edit($id)
    {
        $categories=category::find($id);
        return view('/admin/category/edit',compact('categories'));
    }
    public function update(Request $request,$id)
    {
        $categories=category::find($id);
        $categories->category_name=$request->category_name;
        $categories->update();
        return redirect()->route('all.category')->with('success','post updated');
    }
    public function softdelete($id)
    {
        $delete=category::find($id)->delete();
        //dd($delete);
        return redirect()->back();
    }
    public function restore($id)
    {
        $delete=category::withTrashed()->find($id)->restore();
        return redirect()->back();
    }
    public function delete($id)
    {
        $delete=category::withTrashed()->find($id)->forcedelete();
        return redirect()->back();
    }
}
