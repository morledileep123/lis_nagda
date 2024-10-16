<?php

namespace App\Http\Controllers\Admin\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\student\studentsGuardiantMast;
use PDF;
class IdCardController extends Controller
{
    public function index(){
    	 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
    	return view('admin.students.ID-card.index',compact('studentData','classes','sections','batches'));
    }
    public function getIdCard(Request $request){

    	$student = studentsMast::with('student_class','student_batch')->where('admision_no',$request->admision_no)->first();

        if(!empty($student)){
    	   return view('admin.students.ID-card.format.id_card',compact('student'));

        }else{
            return "error";
        }

    }

    public function pdfview(Request $request)
    {
        $getData['getData'] = studentsMast::with('studentsGuardiantMast','stdBloodGroup','p_country','p_state','p_city')->first();
    	$guardiantData  = array();
    	$guardiantId  = array();
    	// dd($getData	);
    	foreach ($getData['getData']->studentsGuardiantMast as $value) {
    		$guardiantData[] = $value->guardiant_relation;
    	}
    	foreach ($guardiantData as $value2) {
    		$guardiantId[] = $value2->id;
    	}

    	$getData['studentsGuardiant'] = studentsGuardiantMast::with('guardiant_relation')->whereIn('relation_id',$guardiantId)->get();
 
        $pdf = PDF::loadView('admin.students.ID-card.id-card', $getData);
   
     	return $pdf->download('id-card.pdf');
      

    }
    public function id_card_format(){
        return view('admin.students.ID-card.format.index');
    }
}
