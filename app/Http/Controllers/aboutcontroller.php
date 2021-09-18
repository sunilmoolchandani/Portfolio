<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homeabout;
use Illuminate\Support\Carbon;

class aboutcontroller extends Controller
{
    //
    public function homeabout()
    {
        $homeabout=Homeabout::latest()->first();
        return view('admin.home.index',compact('homeabout'));
    }
    public function addabout()
    {
        return view('admin.home.create');
    }
    public function storeabout(Request $request)
    {
        
        Homeabout::insert([
        'title'=>$request->title,
        'short_desc'=>$request->short_desc,
        'desc'=>$request->desc,
        'created_at'=>carbon::now()
        
    ]);
    return back();
    }
    public function editabout($id)
    {
        $homeabout=Homeabout::find($id);
        return view('admin.home.edit',compact('homeabout'));
    }
    public function updateabout(Request $request,$id)
    {
        $update=Homeabout::find($id)->update([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'desc'=>$request->desc,
            
        ]);
        return back();
    }
    public function deleteabout($id)
    {
        $delete=Homeabout::find($id)->delete();
        return back();
    }
}
