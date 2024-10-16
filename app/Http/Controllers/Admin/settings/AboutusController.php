<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Aboutus;
class AboutusController extends Controller
{
    
    public function index()
    {
        $aboutusDatas = Aboutus::get();
        return view('admin.settings.aboutus.index',compact('aboutusDatas'));
            
    }

   
    public function create()
    {
        return view('admin.settings.aboutus.create');
        
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'about_title'=>'required',
            'about_des'=>'required',
        ]);
        if($request->hasFile('about_image')){
            $data['about_image'] =  file_upload($request->about_image,'aboutus_image');
        }else{
             $data['about_image'] = '';
        }
        Aboutus::create($data);

        return redirect()->back()->with('success','About added successfully');

    }

    public function show($id)
    {
        $aboutusDatas = Aboutus::where('about_id',$id)->first();
            return view('admin.settings.aboutus.show',compact('aboutusDatas'));
    }

    public function edit($id)
    {
        $aboutusDatas = Aboutus::where('about_id',$id)->first();
            return view('admin.settings.aboutus.edit',compact('aboutusDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'about_title'=>'required',
            'about_des'=>'required',
        ]);
        if($request->hasFile('about_image')){
            $data['about_image'] =  file_upload($request->about_image,'aboutus_image');
        }else{
            $dataImg = Aboutus::where('about_id',$id)->select('about_image')->first();
            Aboutus::where('about_id',$id)->update(array('about_image'=>$dataImg->about_image));
        }
        Aboutus::where('about_id',$id)->update($data);

        return redirect()->back()->with('success','About updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
