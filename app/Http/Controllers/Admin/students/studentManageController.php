<?php

namespace App\Http\Controllers\Admin\students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\studentsMast;
use App\Models\student\StudentMastPrevReocrd;
use Carbon\Carbon;
use Auth;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
class studentManageController extends Controller
{


	public function forwardTranferStudent(Request $request){

        // return $request->all();

        $students = studentsMast::whereIn('id',$request->stud_id)->get();
        $std_class_id   = $request->forwardClass;
        $batch_id       = $request->forwardBatch;
        $section_id     = $request->forwardSection;
       // return $batch_id;
       
        if($request->status == 'T'){
            $class      = studentClass::where('id',$request->forwardClass)->first();
            $class_sq   = $class->sequence +1;
            $newClass   = studentClass::where('sequence',$class_sq)->first();

            $batch = studentBatch::where('id',$request->forwardBatch)->first();
            // return $batch;
            $batch_name =(substr($batch->batch_name, 5)).'-'.((int)substr($batch->batch_name, 5) +1);

            $newBatch = studentBatch::where('batch_name',$batch_name)->first();
            if(!empty($newBatch)){
                $batch_id = $newBatch->id;
                // return $batch_id;
            }else{
                 return [
                    'status' => 'error',
                    'message' => 'Next batch not find'
                ];
            }

            if(!empty($newClass)){
                $std_class_id = $newClass->id;
            }else{
                return [
                    'status' => 'error',
                    'message' => 'Next class not find'
                ];
            }
        }
            // return $newClass;

        // return $batch_id;
    	$stud_id =  $request->stud_id;
    	$forward_date = date('Y-m-d');

    	foreach ($stud_id as $id) {
    		$student = studentsMast::find($id);
    		$data =[
    			'std_class_id'   => $std_class_id,
    			'batch_id'       => $batch_id,
    			'section_id'     => $section_id,
    			'forward_date'   => $forward_date,
    		];
    		$student->update($data);

            if($student->is_fees_assign){
                student_fee_assign($student);
            }

    	}


        foreach ($students as $student) {
            $data = [
                's_id'      => $student->id,
                'std_class_id'  => $student->std_class_id,
                'batch_id'  => $student->batch_id,
                'section_id'=> $student->section_id,
                'status'    => $request->status,
                'date'      => date('Y-m-d'),
                'roll_no'   => $student->roll_no,
                'user_id'   => Auth::user()->id
            ];
            StudentMastPrevReocrd::create($data);
        }



    	return [
            'status'  => 'success',
            'message' => 'Student '.($request->status == 'T' ? 'Transferred' : 'Forwarded').' Successfully'
        ];
    }

    public function passoutStudent(Request $request){
        $stud_id =  $request->stud_id;
    	
    	foreach ($stud_id as $id) {
    		$student = studentsMast::find($id);
    		$data =[
    			'passout_date' => $request->passout_date,
    			'status' => 'P'    		
    		];
    		$student->update($data);
    	}
    	return 'Success';
    }

     public function dropoutStudent(Request $request){
    	$stud_id =  $request->stud_id;
    	$dropout_date = date('Y-m-d',strtotime($request->dropout_date));
    	
    	foreach ($stud_id as $id) {
    		$student = studentsMast::find($id);
    		$data =[
    			'dropout_date' => $dropout_date,
    			'status' => 'D'    		 //Drop student
    		];
    		$student->update($data);
    	}
    	return 'Success';
    }
}
