<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use Auth;
use Image;
use Illuminate\Support\Carbon;

class homecontroller extends Controller
{
    public function index()
    {
        $sliders=slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function addslider()
    {
        return view('admin.slider.create');
    }
    public function storeslider(Request $request)
    {
        // $validated = $request->validate([
        //     'brand_name' => 'required|unique:brands|max:255',
        //      'slider_image' => 'required|mimes:jpg.jpeg,png'
        // ]);
        $slider_image=$request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        
        Image::make($slider_image)->save('image/slider/'.$name_gen);
        $last_img='image/slider/'.$name_gen;
        
       
        slider::insert([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$last_img,
        'created_at'=>Carbon::now()
        ]);
// return redirect()->route('slider')->with('success','success hogya');
    }
    public function edit($id)
    {
        $slider=slider::find($id);
        
        return view('admin.slider.edit',compact('slider'));

    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $old_image=$request->old_image;
        $slider_image=$request->file('image');


        if($slider_image)
        {
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($slider_image->getClientOriginalExtension());
            $img_name=$name_gen.'.'.$img_ext;
            $up_location='image/slider/';
            $last_img=$up_location.$img_name;
            $slider_image->move($up_location,$img_name);
            unlink($old_image);
            slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$last_img,
                'created_at'=>Carbon::now()
                ]);
        return redirect()->back()->with('success','success hogya');
        }
        else{
            slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'created_at'=>Carbon::now()
                ]);
        return redirect()->back()->with('success','success hogya');
        }  
    }   
}
