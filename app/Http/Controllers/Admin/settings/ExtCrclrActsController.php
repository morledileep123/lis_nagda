<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\SettingExtCrclrActs;

class ExtCrclrActsController extends Controller
{
   
    public function index()
    {
        $extCrclrActsDatas = SettingExtCrclrActs::get();
        return view('admin.settings.extra-curricular-activities.index',compact('extCrclrActsDatas'));
            
    }

    public function create()
    {
        return view('admin.settings.extra-curricular-activities.create');
        
    }
   
    public function store(Request $request)
    {
        $data = $request->validate([
            'ext_crclr_acts_title'=>'required',
            'ext_crclr_acts_des'=>'required',
        ]);
        if($request->hasFile('ext_crclr_acts_image')){
            $data['ext_crclr_acts_image'] =  file_upload($request->ext_crclr_acts_image,'Extra_crclr_acts_image');
        }else{
             $data['ext_crclr_acts_image'] = '';
        }
        SettingExtCrclrActs::create($data);

        return redirect()->back()->with('success','Extra Curricular Activities added successfully');

    }

    public function show($id)
    {
        $extCrclrActsDatas = SettingExtCrclrActs::where('ext_crclr_acts_id',$id)->first();
            return view('admin.settings.extra-curricular-activities.show',compact('extCrclrActsDatas'));
    }

    public function edit($id)
    {
        $extCrclrActsDatas = SettingExtCrclrActs::where('ext_crclr_acts_id',$id)->first();
            return view('admin.settings.extra-curricular-activities.edit',compact('extCrclrActsDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'ext_crclr_acts_title'=>'required',
            'ext_crclr_acts_des'=>'required',
        ]);
        if($request->hasFile('ext_crclr_acts_image')){
            $data['ext_crclr_acts_image'] =  file_upload($request->ext_crclr_acts_image,'Extra_crclr_acts_image');
        }else{
            $dataImg = SettingExtCrclrActs::where('ext_crclr_acts_id',$id)->select('ext_crclr_acts_image')->first();
            SettingExtCrclrActs::where('ext_crclr_acts_id',$id)->update(array('ext_crclr_acts_image'=>$dataImg->ext_crclr_acts_image));
        }
        SettingExtCrclrActs::where('ext_crclr_acts_id',$id)->update($data);

        return redirect()->back()->with('success','Extra Curricular Activities updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
