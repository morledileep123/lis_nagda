<?php

namespace App\Http\Controllers\Frontend\cbscSection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\setting\Committees;
use App\Models\student\studentsMast;
use App\Models\studentclass\AssignSubjectToClass;
use App\Models\setting\Settings;
use Auth;
use URL;
use PDF;

class CbscSectionController extends Controller
{
    // public function index(){
    // 	return view('frontend/CBSC-Section/index');

    // }
    public function cbscInformation(){

        $file = public_path()."/school-documents1.pdf";
            $headers = array('Content-Type: application/pdf',$file);

            return response()->file($file);

    }

    public function public_disclosure(){
        return view('frontend/CBSC-Section/public_disclosure');
    }

    public function committees(){
        $committeesDatas = Committees::get();
    	return view('frontend/CBSC-Section/committees',compact('committeesDatas'));

    }
    public function transferCertificate(){
    	return view('frontend/CBSC-Section/transfer-certificate');

    }
    public function auditorsReport(){
    	return view('frontend/CBSC-Section/auditors-report');

    } 
    public function getStudentCert(Request $request){
         // dd($request->);
        $showRequest = studentsMast::with(['student_class','student_section','student_batch','studentsGuardiantMast'])
                    ->where('admision_no',$request->admission_no)
                    ->first();
        // dd($showRequest);
        if ($request->admission_no == $showRequest->admision_no) {
            $subjectName = AssignSubjectToClass::with('assign_subjectId.subject')->where('std_class_id',$showRequest->std_class_id)
                        ->where('section_id',$showRequest->section_id)
                        ->where('batch_id',$showRequest->batch_id)->first();
           
            $baseUrl = URL::to('/').'/';
            $settings = Settings::first();
            
            return view('frontend.CBSC-Section.certificate_template',compact('showRequest','settings','subjectName'));
        }else{
            return 'error';

        }          

    }

    public function getStudentCertPdf($admission_no){
         // dd($admission_no);
        $showRequest = studentsMast::with(['student_class','student_section','student_batch','studentsGuardiantMast'])
                    ->where('admision_no',$admission_no)
                    ->first();
        // dd($showRequest);
        if ($admission_no == $showRequest->admision_no) {
            $subjectName = AssignSubjectToClass::with('assign_subjectId.subject')->where('std_class_id',$showRequest->std_class_id)
                        ->where('section_id',$showRequest->section_id)
                        ->where('batch_id',$showRequest->batch_id)->first();
           
            $baseUrl = URL::to('/').'/';
            $settings = Settings::first();
            
            // return view('frontend.CBSC-Section.certificate_template',compact('showRequest','settings','subjectName'));
            $pdf = PDF::loadView('frontend.CBSC-Section.certificate_pdf',compact('showRequest','settings','subjectName'));
         
          // download PDF file with download method
          return $pdf->download('transfer_certificate.pdf');
        }else{
            return 'error';

        }



    }
   
    
}
