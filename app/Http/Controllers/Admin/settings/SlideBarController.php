<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\SlideBar;
// use App\Models\master\mothetongueMast;

class SlideBarController extends Controller
{
    
    public function index()
    {
        $slidebarImages = SlideBar::get();
        return view('admin.settings.slidebar.index',compact('slidebarImages'));
        
    }

 
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'slidebar_image'=>'required|mimes:jpeg,png,jpg,gif,svg|max:4098'
        ]);

         if($request->hasFile('slidebar_image')){
            $data['slidebar_image'] =  file_upload($request->slidebar_image,'slidebar_image');
        }
        if($request->flag == 'add'){
            SlideBar::create($data);
            return redirect()->back()->with('success','Slidebar image added successfully');
        }else{
            SlideBar::where('slider_bar_id',$request->slider_bar_id)->update($data);
            return redirect()->back()->with('success','Slidebar image updated successfully');
        }
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        SlideBar::where('slider_bar_id',$id)->delete();
            return redirect()->back()->with('success','Slidebar image deleted successfully');

    }
}
