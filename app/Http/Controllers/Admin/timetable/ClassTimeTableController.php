<?php

namespace App\Http\Controllers\Admin\timetable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\AssignSubject;
use App\Models\master\Subject;
use App\Models\studentclass\AssignSubjectIdToClass;
use App\Models\studentclass\AssignSubjectToClass;
use App\Models\timetable\ExamTimeTable;
use App\Models\timetable\ExamTimeTableMast;
use App\Models\timetable\ClassTimeTableMast;
use App\Models\timetable\ClassTimeTable;
use App\Models\timetable\ClassPeriodTime;
use App\Models\teachers\Teacher;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\User;
use Validator;
class ClassTimeTableController extends Controller
{
  
    public function index()
    {
       // dd('sdf');   
     // $examTimeTableMast = ExamTimeTableMast::with(['get_time_table.get_subject','get_time_table.get_class','get_from_class','get_to_class'])->get();
     $classWiseTimeTables = ClassTimeTableMast::with('get_class','get_class_teacher')->get();
     $classes = studentClass::get();
       // dd($classWiseTimeTables);
        return view ('admin.timetables.classes-time-table.index',compact('classWiseTimeTables','classes'));
    }

   
    public function create()
    {
        $classes = studentClass::get();
        $teachers = User::where('user_flag','T')->get();

        return view ('admin.timetables.classes-time-table.create',compact('classes','teachers'));
        
    }

   
    public function store(Request $request)
    {                
        dd($request->all());
        // $nod = $request->nod;
        // $classFrom = $request->class_from;
        // $classTo   = $request->class_to;
        // $getClasses = studentClass::whereBetween('id',[$classFrom,$classTo])->get(); 
        Validator::make($request->all(),[
            'std_class_id'=>'required',
            'batch_id'=>'required',
            'section_id'=>'required',
            'medium'=>'required',
            'periods_no'=>'required',
            'class_teacher'=>'required'
        ]);
        $data = [
            'std_class_id'=>$request->std_class_id,
            'batch_id'=>$request->batch_id,
            'section_id'=>$request->section_id,
            'medium'=>$request->medium,
            'periods_no'=>$request->periods_no,
            'teachers_id'=>$request->class_teacher,
            'remark'=>$request->remark

        ];
        // dd($request->all());

         // $classttMstId = 2;
        // dd($request->all());
         $classttMstId = ClassTimeTableMast::create($data)->class_tt_id;
        // dd($classttMstId->class_tt_id);
        //dd($classttMstId);
        foreach ($request->from_time as $key => $fromOrToTime) {
            // if ($key!=0 && $key!=5) {  
                $fromOrToTime = [
                    'class_tt_mst_id' => $classttMstId,
                    'from_time'=> $fromOrToTime,
                    'to_time'=> $request->to_time[$key]
                ];
                // echo "<br>";
                // echo $key;
                ClassPeriodTime::create($fromOrToTime);
            // }elseif($key == 0){
            //  echo 'assembly';   
            // }elseif($key == 5){
            //  echo 'lunchtest';   
            // }
        }
        // dd('test');
        $days = 6;
        if (!empty($request->periods_no)) {
            for($i=1; $i <= $days ; $i++){
                for ($j=1; $j <=$request->periods_no; $j++) { 
                    $subjects = 'subjects_'.$j.'_'.$i;
                    $teachers = 'teachers_'.$j.'_'.$i;
                    $class_time_table = [
                            'class_tt_mst_id' => $classttMstId,
                            'subject_id' => $request->$subjects,
                            'teacher_id' => $request->$teachers
                         ];
                    ClassTimeTable::create($class_time_table);
                 }
            }
        }
        // dd($class_time_table);
         return redirect()->route('class-wise-time-table.index')->with('success',' Class Time table added successfully');
    }

    public function show($id)
    {
         $examTimeTableMast = ExamTimeTableMast::with(['get_time_table.get_subject','get_time_table.get_class','get_time_table'=> function($q){
                $q->orderBy('date','DESC');
        }])->where('time_id',$id)->get();

        $timeTabale = ExamTimeTableMast::where('time_id',$id)->with(['get_time_table','get_from_class','get_to_class'])->first();
        return view ('admin.timetables.show',compact('examTimeTableMast','timeTabale'));

    }

   
    public function edit($id)
    {


// dd($Teacher);
    $classTimeTables = ClassTimeTableMast::where('class_tt_mast_id',$id)->with(['classTimetable.get_subject','classTimetable.get_teacher','periodsTime','get_class_teacher','get_class','get_batch','get_section','get_class_teacher'])->first();
	//dd($classTimeTables);
     //return $classTimeTables;

	// $getSubTeacher = ClassTimeTableMast::with(['class_tt_mst_id', $id])	
    // $examTimeTableMast = ExamTimeTableMast::with(['get_time_table.get_subject','get_time_table.get_class','get_time_table'=> function($q){
    //             $q->orderBy('date','ASC');
    //     }])->where('time_id',$id)->get(); 
    // $examTimeTableMast = ExamTimeTableMast::where('time_id',$id)->get();
    // return $examTimeTableMast;
    // $getClasses = studentClass::with(['assignsubject'=>function($q){
    //         $q->where('batch_id',1)->with(['assign_subjectId.subject']);
    //     }])->whereBetween('id',[$timeTable->class_from,$timeTable->class_to])->get();
    // dd($examTimeTableMast);
    // return $getClasses;
    // $classes = studentClass::get();
    $medium   = 'EM';
    $getClasses = studentClass::with(['assignsubject'=>function($q)use($medium){
            $q->where('medium',$medium)->with(['assign_subjectId.subject']);
        }])->where('id',[$classTimeTables->std_class_id])->get();
    $teachers = User::where('user_flag','T')->get();
    $classes = studentClass::get();
    $studentSections = studentSectionMast::get();
    $studentBatchs = studentBatch::get();
    // dd($getClasses);
    // $nod = 2;   
        return view ('admin.timetables.classes-time-table.edit',compact('classTimeTables','examTimeTableMast','teachers','nod','getClasses','classes','studentBatchs','studentSections'));
        
    }

   
    public function update(Request $request, $id)
    {
// dd($request->all());
       // return $request;
       Validator::make($request->all(),[
            'std_class_id'=>'required',
            'batch_id'=>'required',
            'section_id'=>'required',
            'medium'=>'required',
            'periods_no'=>'required',
            'class_teacher'=>'required'
        ]);
        $data = [
            'std_class_id'=>$request->std_class_id,
            'batch_id'=>$request->batch_id,
            'section_id'=>$request->section_id,
            'medium'=>$request->medium,
            'periods_no'=>$request->periods_no,
            'teachers_id'=>$request->class_teacher,
            'remark'=>$request->remark

        ];
        // dd($request->all());

         // $classttMstId = 2;
        // dd($request->all());
        $classttMstId = ClassTimeTableMast::where(['class_tt_mast_id'=>$id,'section_id'=>$request->section_id,'batch_id'=>$request->batch_id,'medium'=>$request->medium])->update($data);
        $getPeriodeTime = ClassPeriodTime::where('class_tt_mst_id',$id)->get();
        // dd($getPeriodeTime);
        $periodsTimes=[];
        foreach ($getPeriodeTime as $key => $value) {
            $periodsTimes[] =$value->prd_tm_id;
        }
        // dd($periodsTimes);
        foreach ($request->from_time as $key => $fromOrToTime) {
            // if ($key!=0 && $key!=5) {  
                $fromOrToTime = [
                    'from_time'=> $fromOrToTime,
                    'to_time'=> $request->to_time[$key]
                ];
                
                 ClassPeriodTime::where('prd_tm_id',$periodsTimes[$key])->where('class_tt_mst_id',$id)->update($fromOrToTime);
            // }elseif($key == 0){
            //  echo 'assembly';   
            // }elseif($key == 5){
            //  echo 'lunchtest';   
            // }
        }
        // dd('test');
        $classTimeTables=[];
        $getTimeTables = ClassTimeTable::where('class_tt_mst_id',$id)->get();
        // dd($getTimeTables);
        foreach ($getTimeTables as $key1 => $getTimeTable) {
            $classTimeTables[] =$getTimeTable->class_tt_id;
        }
       
        // dd($classTimeTables);
        $days = 6;
        $count = 0;
        if (!empty($request->periods_no) ) {
            for($i=1; $i <= $days ; $i++){
                for ($j=1; $j <=$request->periods_no; $j++) { 
                    $subjects = 'subjects_'.$j.'_'.$i;
                    $teachers = 'teachers_'.$j.'_'.$i;
                    $class_time_table = [
                        'subject_id' => $request->$subjects,
                        'teacher_id' => $request->$teachers
                    ];
                    if (!empty($request->$subjects) && !empty($request->$teachers)) {
                        // echo "success";
                        // ClassTimeTable::where('class_tt_id',$classTimeTables[$count++])->where('class_tt_mst_id',$id)->update($class_time_table);
                    }
                    echo "<br>";
                    echo $i;
                 }
            }
        }
        // return redirect()->route('class-wise-time-table.index')->with('success',' Class Time table update successfully');
    }

 
    public function destroy($id)
    {
        //
    }

    public function classTimeTableGenrate(Request $request){
        $std_class_id = $request->std_class_id;
        $classTo   = $request->classTo;
        $medium   = 'EM';
        $nod       = $request->periods_no;

        // dd($request->all());
        $getClasses = studentClass::with(['assignsubject'=>function($q)use($medium){
            $q->where('medium',$medium)->with(['assign_subjectId.subject']);
        }])->where('id',[$std_class_id])->get();
        // }])->whereBetween('id',[$classFrom,$classTo])->get();
        // return $getClasses;
        // dd($getClasses);
        $teachers = User::where('user_flag','T')->get();
        // dd($teachers);
        return view ('admin.timetables.classes-time-table.table-genrate',compact('getClasses','nod','teachers'));
    }
}
