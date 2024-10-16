<?php

namespace App\Http\Controllers\Admin\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\Subject;
use Auth;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\AssignSubject;
use App\Models\student\studentsMast;
use App\Models\AssignSubjectGroupStudent;
use App\Models\classes\SectionManage;
use App\Models\studentclass\AssignSubjectIdToClass;
use App\Models\studentclass\AssignSubjectToClass;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = Subject::where('parent_id',null)->get();
// dd( $subject);
        return view('admin.manage.subject.index',compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->parent_id != null){
           $subject =  Subject::firstWhere(['parent_id' => $request->parent_id,'subject_name' => $request->subject_name]);
            if(!empty($subject)){
                $request->validate([
                    'subject_name' => 'required|unique:subjects,subject_name,'.$request->subject_id
                ]);
            }
        }else{
            $request->validate([
                'subject_name' => 'required|unique:subjects,subject_name,'.$request->subject_id
            ]);
        }
        $data = $request->validate([
            'subject_code'=>'required|unique:subjects,subject_code,'.$request->subject_id,
            'subject_sequence'=>'required|unique:subjects,subject_sequence,'.$request->subject_id,  
            'parent_id' => 'nullable'          
        ]);
        $data['subject_name'] = $request->subject_name;
        $data['user_id']= Auth()->user()->id;

        if($request->flag == 'add'){
            Subject::create($data);
            $success = 'Subject added successfully';
        }else{
            Subject::where('id',$request->subject_id)->update($data); 
            $success = 'Subject updated successfully';
        }

        return redirect()->back()->with('success',$success);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
                'subject_name'=>'required',
                'subject_code'=>'required'
        ]);

        $data['user_id']= Auth()->user()->id;
        $data['subject_sequence']= $request->subject_sequence;
        Subject::where('id',$id)->update($data);

        return redirect()->back()->with('success','Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return redirect()->back()->with('success','Subject deleted successfully');

    }

    public function assignSubject(){
        $classes = studentClass::get();
        $subjects = Subject::where('parent_id',null)->get();            

        $assignSubjects = AssignSubjectToClass::with(['assign_subjectId.subject','batch','class','section'])->get();

        return view('admin.manage.subject.assign-subject.index',compact('classes','subjects','assignSubjects'));
    }

    public function assignSubjectAdd(Request $request){
        // dd($request);
        $data = $request->validate([
            'std_class_id' =>'required',
            'batch_id'     =>'required',
            'section_id'   =>'required',
            'medium'       =>'required',            
        ]);
        $request->validate([
            'mendatory_subject_id' =>'required|array'
        ]);

        $data['user_id']= Auth()->user()->id;

        // return $request->all();
        $old = AssignSubjectToClass::where(['std_class_id' => $request->std_class_id , 'batch_id' => $request->batch_id, 'section_id' => $request->section_id,'medium' => $request->medium])->first();


        if(empty($old)){
            $lastId = AssignSubjectToClass::create($data);
            // return gettype($request->mendatory_subject_id);
            $lastId->subject_assign()->sync($request->mendatory_subject_id);
            return redirect()->back()->with('success','Subject assigned successfully');

        }else{
            // $lastId = AssignSubjectToClass::find($old->id)->update($data);
            $old->subject_assign()->sync($request->mendatory_subject_id);

            return redirect()->back()->with('success','Subject updated successfully');

        }

    }

    public function subjectAssignToStudent(){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $subject  = Subject::get();
        return view('admin.class.subject.assign-student',compact('classes','sections','batches','subject'));
    }

    public function studentGetForAssignSubject(Request $request){
        // dd( $request);
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
         $subject     = Subject::get();
         $assignSubject = AssignSubject::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->first();
                                // dd($assignSubject);
         $students = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
        $page = request()->page; 
          return view('admin.class.subject.table',compact('students','page','studentData','classes','sections','batches','subject','assignSubject'));
    }

    public function studentAddForAssignSubject(Request $request){
            $stud_id =  $request->s_id;
            foreach ($stud_id as $id) {
                $data =[
                        's_id'=>$id,
                        'subject_group_id'=>$request->subject_group_id,
                        'subject_group_name'=>$request->subject_group_name,
                        'user_id' =>Auth::user()->id
                ];
                $getData = AssignSubjectGroupStudent::where('s_id',$id)->update($data);
                if(empty($getData)){

                    AssignSubjectGroupStudent::create($data);
                }
            }
        return "Success";
    
    } 

    
}
