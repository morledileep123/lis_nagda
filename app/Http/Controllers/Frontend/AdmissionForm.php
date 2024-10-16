<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helpers;
use App\Models\frontend\AdmissionInquiryForm;
use Auth;
use App\User;
class AdmissionForm extends Controller
{
    
    public function admissionInquiryForm(Request $request){
    	$data = $request->validate([
					'your_name'=>'required',
					'your_email'=>'required|email',
					'child_name'=>'required',
					'child_age'=>'required|numeric',
					'child_class'=>'required',
					'mobile_no'=>'required|min:10|numeric'
				]);
        $create_stud = AdmissionInquiryForm::create($data);
        if ( $create_stud) {
         
        	return redirect()->back()->with('success','Admission Inquiry Send successfully');
         } 
    }
    public function getadmissionInquiryFormData(){
    	$datas = AdmissionInquiryForm::get();
    	return view('admin.admission-inquiry.index',compact('datas'));
    }
    public function getadmissionInquiryForNotification(){
    	$datas = AdmissionInquiryForm::where('status',0)->get();
    	$count = count($datas);
    	return view('layout.header',compact('count'));
    }
}
