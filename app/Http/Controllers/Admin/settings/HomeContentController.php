<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\HomeContents;

class HomeContentController extends Controller
{
   
    public function index()
    {
        // dd('sd'); 
        $homeContents =HomeContents::get();
        return view('admin.settings.homecontent.index',compact('homeContents'));
        
    }

    public function create()
    {
        return view('admin.settings.homecontent.create');
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // 'content_title'=>'required',
            'content_des'=>'required',
        ]);
        $data['content_title'] = $request->content_title;
        if($request->hasFile('content_image')){
            $data['content_image'] =  file_upload($request->content_image,'Home_content_image');
        }else{
             $data['content_image'] = '';
        }
        if($request->hasFile('content_icon')){
            $data['content_icon'] =  file_upload($request->content_icon,'Home_content_icon');
        }else{
             $data['content_icon'] = '';
        }
        HomeContents::create($data);

        return redirect()->back()->with('success','Home Content added successfully');
    }

    public function show($id)
    {
        $homeContent =HomeContents::where('home_c_id',$id)->first();
        return view('admin.settings.homecontent.show',compact('homeContent'));
    }

    
    public function edit($id)
    {
        $homeContent =HomeContents::where('home_c_id',$id)->first();
        return view('admin.settings.homecontent.edit',compact('homeContent'));
    }

    
    public function update(Request $request, $id)
    {
        $data['content_title'] = $request->content_title;
        $data['content_des']   = $request->content_des;

        if($request->hasFile('content_image')){
            $data['content_image'] =  file_upload($request->content_image,'Home_content_image');
        }else{
            $dataImg = HomeContents::where('home_c_id',$id)->select('content_image')->first();
            HomeContents::where('home_c_id',$id)->update(array('content_image'=>$dataImg->content_image));
        }
        if($request->hasFile('content_icon')){
            $data['content_icon'] =  file_upload($request->content_icon,'Home_content_icon');
        }else{
            $dataIcon = HomeContents::where('home_c_id',$id)->select('content_icon')->first();
            HomeContents::where('home_c_id',$id)->update(array('content_icon'=>$dataIcon->content_icon));
        }
        HomeContents::where('home_c_id',$id)->update($data);

        return redirect()->back()->with('success','Home Content updated successfully');
    }

    public function destroy($id)
    {
        //
    }
}
