<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sunil;
use Auth;
use Illuminate\Support\Carbon;
class sunilcontroller extends Controller
{
    //
    public function allsunil()
    {
        return view('admin/sunil/index');
    }
    
    public function addsunil(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required||max:255'
        ],
        [
            'category_name.required' => 'Please fill'
        ]);
    sunil::insert([
        'category_name'=>$request->category_name,
        'user_id'=>Auth::user()->id,
        'created_at'=>Carbon::now()
    ]);
}
}
