<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\SettingAcademic;

class AcademicsController extends Controller
{
   
    public function index()
    {
        $academicDatas = SettingAcademic::get();
        return view('admin.settings.academics.index',compact('academicDatas'));
    }

   
    public function create()
    {
        return view('admin.settings.academics.create');
        
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'academic_title'=>'required',
            'academic_des'=>'required',
        ]);
        if($request->hasFile('academic_image')){
            $data['academic_image'] =  file_upload($request->academic_image,'academic_image');
        }else{
             $data['academic_image'] = '';
        }
        SettingAcademic::create($data);

        return redirect()->back()->with('success','Academic added successfully');

    }

    
    public function show($id)
    {
        $academicDatas = SettingAcademic::where('academic_id',$id)->first();
            return view('admin.settings.academics.show',compact('academicDatas'));
    }

    
    public function edit($id)
    {
        $academicDatas = SettingAcademic::where('academic_id',$id)->first();
            return view('admin.settings.academics.edit',compact('academicDatas'));
    }

 
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'academic_title'=>'required',
            'academic_des'=>'required',
        ]);
        if($request->hasFile('academic_image')){
            $data['academic_image'] =  file_upload($request->academic_image,'Academics_image');
        }else{
            $dataImg = SettingAcademic::where('academic_id',$id)->select('academic_image')->first();
            // dd($data->academic_image);
            SettingAcademic::where('academic_id',$id)->update(array('academic_image'=>$dataImg->academic_image));
        }
        SettingAcademic::where('academic_id',$id)->update($data);

        return redirect()->back()->with('success','Academic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
