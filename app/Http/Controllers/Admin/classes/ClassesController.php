<?php

namespace App\Http\Controllers\Admin\classes;

use Auth;
use Validator;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\Subject;
use App\Models\classes\SectionManage;
use App\Models\classes\AssignStudentToSection;
use App\Models\student\studentsMast;


class ClassesController extends Controller
{
    
    // student class add code.............................
    public function studentClasses()
    {
    	$studentclassdata = studentClass::get();
    		return view('admin.manage.class.index',compact('studentclassdata'));
    } 
    public function addClasses(Request $request)
    {
        $data = $request->validate([
            'class_name'=>'required',
            'class_description'=>'required'
        ]);
        if($request->flag == 'add'){
            $data['user_id']    = Auth::user()->id;
            studentClass::create($data);
            return redirect()->back()->with('success','Class added successfully');
        }else{
            studentClass::where('id',$request->class_id)->update($data);
            return redirect()->back()->with('success','Class updated successfully');
        }

    }
    
	// end student class add code.............................
    public function assignSectionList(){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();

         $sectionList = SectionManage::with('section_names','class_name','batch_name')->where('batch_id',session('current_batch'))->get();
         
         // return $sectionList;
        return view('admin.manage.section.assign-section.index',compact('classes','sections','batches','sectionList'));

    }

     public function addSectionList(Request $request){

            // return $request->all();
            foreach ($request->course_id as $key =>  $course_id) {
                $data = [
                    'user_id'   =>Auth::user()->id,
                    'class_id'  =>$course_id,
                    'batch_id'  =>$request->batch_id[$key],
                    'section_id'=>$request->section_id[$key],
                    'medium'    =>$request->medium[$key],
                ];

                $old = SectionManage::where(['section_id' => $data['section_id'], 'class_id' => $data['class_id'], 'batch_id' => $data['batch_id'],'medium' => $data['medium']])->first();
                if(empty($old)){
                    SectionManage::create($data);
                }


            }
        return 'Section added successfully';
        
    }

    public function assignSectionListDelete($id){
    	$data = SectionManage::find($id)->delete();
        	 return redirect()->back()->with('success','Section deleted successfully');
    }

    public function studentAssignsection(){

    	 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $subject = Subject::get();
         return view('admin.class.section.assign-section-student',compact('classes','sections','batches','subject'));
    }
    public function getStudentList(Request $request){
    	$getStudentList = studentsMast::where('section_id',$request->section_id)
    						->where('std_class_id',$request->course_id)
    						->where('batch_id',$request->batch_id)
    						->get();    						
    	 return response()->json($getStudentList);
    }



    public function assignSubjectToSection(Request $request){
        $assign_student =  $request->assign_student;
    	foreach ($assign_student as $id) {
                $data =[
                        'user_id' =>Auth::user()->id,
                        'class_id'=>$request->course_id,
                        'batch_id'=>$request->batch_id,
                        'section_id'=>$request->section_id,
                        'assign_students_id'=>$id,
                        'un_assign_students_id'=>$request->un_assign_students
                ];
                $getData = AssignStudentToSection::where('assign_students_id',$id)->first();
                // $updateData = AssignStudentToSection::where('section_id',$id)
                //             ->where('course_id',$data['course_id'])
                //             ->where('batch_id',$data['batch_id'])
                //             ->where('assign_students_id',$id)
                //             ->update($data);
                if(empty($getData)){

                    AssignStudentToSection::create($data);
                }
            }
        return 'Student added successfully';
    }


    // public function generateClassSection(Request $request){
    //     $std_class_id   = $request->std_class_id; 
    //     $batch_id       = $request->batch_id; 
    //     $section_id     = $request->section_id; 

    //     return view('admin.class.section.generateClassSection',compact('std_class_id','s'));

    // }

    public function batch_fetch($std_class_id){
// dd($std_class_id);
        return SectionManage::select('id','class_id','batch_id')->with(['batch_name' => function($q){
            $q->select('id','batch_name')->orderBy('batch_name','desc');
        }])->where('class_id',$std_class_id)->groupBy('batch_id')->get();

    }   
    public function section_fetch($std_class_id,$batch_id = null){
        return SectionManage::select('id','class_id','batch_id','section_id')->with(['section_names' => function($q){
            $q->select('id','section_name');
        }])->where(['class_id' => $std_class_id,'batch_id' => $batch_id])->groupBy('section_id')->get();

    }   
    public function medium_fetch($std_class_id,$batch_id = null,$section_id=null){
        return SectionManage::select('id','class_id','batch_id','section_id','medium')->where(['class_id' => $std_class_id,'batch_id' => $batch_id,'section_id' => $section_id])->get();
    }

}
