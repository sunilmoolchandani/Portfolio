<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
use Illuminate\Support\Carbon;

use Auth;

class brandcontroller extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
    public function allbrand()
    {
        $brands=brand::latest()->paginate(2);
        return view('admin.brand.index',compact('brands'));
    }

    public function storebrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
             'brand_image' => 'required|mimes:jpg.jpeg,png'
        ]);
        $brand_image=$request->file('brand_image');
        $name_gen=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/brand/';
        $last_img=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        Brand::insert([
'brand_name'=>$request->brand_name,
'brand_image'=>$last_img,
'created_at'=>Carbon::now()
        ]);
return redirect()->back()->with('success','success hogya');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function edit($id)
    {
        $brand=brand::find($id);
        return view('admin.brand.edit',compact('brand'));

    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'brand_name' => 'required'
        ]);
        $old_image=$request->old_image;
        $brand_image=$request->file('brand_image');


        if($brand_image)
        {
            $name_gen=hexdec(uniqid());
            $img_ext=strtolower($brand_image->getClientOriginalExtension());
            $img_name=$name_gen.'.'.$img_ext;
            $up_location='image/brand/';
            $last_img=$up_location.$img_name;
            $brand_image->move($up_location,$img_name);
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$last_img,
                'created_at'=>Carbon::now()
                ]);
        return redirect()->back()->with('success','success hogya');
        }
        else{
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'created_at'=>Carbon::now()
                ]);
        return redirect()->back()->with('success','success hogya');
        }
        Brand::find($id)->update([
        'brand_name'=>$request->brand_name,
        'brand_image'=>$last_img,
        'created_at'=>Carbon::now()
        ]);
return redirect()->back()->with('success','success hogya');
    }
    public function delete($id)
    {
        Brand::find($id)->delete();
        return redirect()->back()->with('success','success hogya');
    }
    public function clients()
    {
        $post=brand::get();
        return view('home',compact('post'));
    }
}
