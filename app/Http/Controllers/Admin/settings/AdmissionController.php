<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\AdmissionForm;

class AdmissionController extends Controller
{
    
    public function index()
    {
        $admissionDatas = AdmissionForm::get();
        return view('admin.settings.admission-form.index',compact('admissionDatas'));
            
    }

    public function create()
    {
        return view('admin.settings.admission-form.create',);
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'adm_form_title'=>'required',
            'adm_form_des'=>'required',
        ]);
        if($request->hasFile('adm_form_image')){
            $data['adm_form_image'] =  file_upload($request->adm_form_image,'Admission_form_image');
        }else{
             $data['adm_form_image'] = '';
        }
        AdmissionForm::create($data);

        return redirect()->back()->with('success','Admission-form contents added successfully');

    }

    public function show($id)
    {
        $admissionDatas = AdmissionForm::where('adm_form_id',$id)->first();
            return view('admin.settings.admission-form.show',compact('admissionDatas'));
    }

    public function edit($id)
    {
        $admissionDatas = AdmissionForm::where('adm_form_id',$id)->first();
            return view('admin.settings.admission-form.edit',compact('admissionDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'adm_form_title'=>'required',
            'adm_form_des'=>'required',
        ]);
        if($request->hasFile('adm_form_image')){
            $data['adm_form_image'] =  file_upload($request->adm_form_image,'Admission_form_image');
        }else{
            $dataImg = AdmissionForm::where('adm_form_id',$id)->select('adm_form_image')->first();
            AdmissionForm::where('adm_form_id',$id)->update(array('adm_form_image'=>$dataImg->adm_form_image));
        }
        AdmissionForm::where('adm_form_id',$id)->update($data);

        return redirect()->back()->with('success','Admission-form contents updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
