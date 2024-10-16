<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Aboutus;
use App\Models\setting\SettingAcademic;
use App\Models\setting\SettingExtCrclrActs;
use App\Models\setting\AdmissionForm;
use App\Models\setting\PrincipalsMgs;
use App\Models\setting\Pages;
use App\Models\setting\PagesImage;
class SettingsController extends Controller
{
    
    public function settingAboutus(){
        $pagesDatas = Pages::with('pageImages')->get();
     	$aboutusDatas = Aboutus::get();
    	return view('frontend.About.index',compact('aboutusDatas','pagesDatas'));
	}
	 public function settingAcademics(){
    	$academicDatas = SettingAcademic::get();
    	return view('frontend.Academics.index',compact('academicDatas'));
    }
    public function settingExtCrclrActs(){
    	$extCrclrActs = SettingExtCrclrActs::get();
    	return view('frontend.Extra-curricular-activities.index',compact('extCrclrActs'));
    } 
    public function settingAdmissionForm(){
        $adnFormDatas = AdmissionForm::get();
        return view('frontend.Admission.index',compact('adnFormDatas'));
    }
    public function settingPrincipalsMgs(){
        $principalsMgs = PrincipalsMgs::get();
        return view('frontend.More.principals-message',compact('principalsMgs'));
            
    }
    
   
}
