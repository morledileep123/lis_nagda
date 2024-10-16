<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Contactus;

class ContactusController extends Controller
{
     public function index()
    {
        $contactusDatas = Contactus::get();
        return view('admin.settings.contactus.index',compact('contactusDatas'));
            
    }

   
    public function create()
    {
        return view('admin.settings.contactus.create',);
        
    }

   
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'about_title'=>'required',
        //     'about_des'=>'required',
        // ]);
        $data['contact_us_title'] = $request->contact_us_title;
        $data['contact_us_map_url'] = $request->contact_us_map_url;
        $data['contact_us_des'] = $request->contact_us_des;
        if($request->hasFile('contact_us_image')){
            $data['contact_us_image'] =  file_upload($request->contact_us_image,'contactus_image');
        }else{
             $data['contact_us_image'] = '';
        }
        Contactus::create($data);

        return redirect()->back()->with('success','Contactus added successfully');

    }

    public function show($id)
    {
        $contactusDatas = Contactus::where('contact_us_id',$id)->first();
            return view('admin.settings.contactus.show',compact('contactusDatas'));
    }

    public function edit($id)
    {
        $contactusDatas = Contactus::where('contact_us_id',$id)->first();
            return view('admin.settings.contactus.edit',compact('contactusDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data['contact_us_title'] = $request->contact_us_title;
        $data['contact_us_map_url'] = $request->contact_us_map_url;
        $data['contact_us_des'] = $request->contact_us_des;
        if($request->hasFile('contact_us_image')){
            $data['contact_us_image'] =  file_upload($request->contact_us_image,'contact_us_image');
        }else{
            $dataImg = Contactus::where('contact_us_id',$id)->select('contact_us_image')->first();
            Contactus::where('contact_us_id',$id)->update(array('contact_us_image'=>$dataImg->contact_us_image));
        }
        Contactus::where('contact_us_id',$id)->update($data);

        return redirect()->back()->with('success','Contactus updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
