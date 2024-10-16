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
use Validator;
class TimeTableController extends Controller
{
  
    public function index()
    {
       
     $examTimeTableMast = ExamTimeTableMast::with(['get_time_table.get_subject','get_time_table.get_class','get_from_class','get_to_class'])->get();
       // dd($examTimeTableMast);
        return view ('admin.timetables.index',compact('examTimeTableMast'));
    }

   
    public function create()
    {
        $class = studentClass::get();
        $assignSubject = AssignSubjectToClass::with(['assign_subjectId'])->get();
        return view ('admin.timetables.create',compact('class'));
        
    }

   
    public function store(Request $request)
    {                

        // dd($request->all());
        $nod = $request->nod;
        $classFrom = $request->class_from;
        $classTo   = $request->class_to;
        $getClasses = studentClass::whereBetween('id',[$classFrom,$classTo])->get(); 
        Validator::make($request->all(),[
            'exam_name'=>'required',
            'class_from'=>'required',
            'class_to'=>'required',
            'medium'=>'required',
            'reporting_time'=>'required',
            'deprature_time'=>'required',
            'exam_from_time'=>'required',
            'exam_to_time'=>'required',
            'lunch_from_time'=>'required',
            'lunch_to_time'=>'required',
            'start_dt'=>'required',
            'end_dt'=>'required',
            'nod'=>'required',
            'remark'=>'required',
            '*.date'=>'required'
        ]);
        $data = [
            'name'=>$request->exam_name,
            'class_from'=>$request->class_from,
            'class_to'=>$request->class_to,
            'medium'=>$request->medium,
            'reporting_time'=>$request->reporting_time,
            'deprature_time'=>$request->deprature_time,
            'exam_from_time'=>$request->exam_from_time,
            'exam_to_time'=>$request->exam_to_time,
            'lunch_from_time'=>$request->lunch_from_time,
            'lunch_to_time'=>$request->lunch_to_time,
            'start_dt'=>date('Y-m-d',strtotime($request->start_date)),
            'end_dt'=>date('Y-m-d',strtotime($request->end_date)),
            'remark'=>$request->remark,
            'nod'   =>$request->nod 

        ];
        $lastId = ExamTimeTableMast::create($data)->time_id;

        foreach($getClasses as $class){
            for($i=1; $i <= $nod ; $i++){
                $field_name = 'subject_'.$i.'_'.$class->id; 
                    $exam_time_table[] = [
                        'time_id'=>$lastId,
                        'class_id'=>$class->id,
                        'subject_id'=> $request->$field_name,
                        'date'=> date('Y-m-d',strtotime($request->date[$i-1])) 
                     ];
                     ExamTimeTable::create($exam_time_table);
            }
        }
        return redirect()->route('time-table.index')->with('success','Time table added successfully');

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

    $timeTable = ExamTimeTableMast::where('time_id',$id)->first();


    // $examTimeTableMast = ExamTimeTableMast::with(['get_time_table.get_subject','get_time_table.get_class','get_time_table'=> function($q){
    //             $q->orderBy('date','ASC');
    //     }])->where('time_id',$id)->get(); 

    $examTimeTableMast = ExamTimeTableMast::where('time_id',$id)->get();

    // return $examTimeTableMast;

    
    $getClasses = studentClass::with(['assignsubject'=>function($q){
            $q->where('batch_id',1)->with(['assign_subjectId.subject']);
        }])->whereBetween('id',[$timeTable->class_from,$timeTable->class_to])->get();
    // dd($examTimeTableMast);
    // return $getClasses;

        return view ('admin.timetables.edit',compact('timeTable','getClasses','examTimeTableMast'));
        
    }

   
    public function update(Request $request, $id)
    {

       // return $request;
        $classFrom = $request->class_from;
        $classTo   = $request->class_to;
        $nod   = count($request->date);

        $getClasses = studentClass::whereBetween('id',[$classFrom,$classTo])->get(); 
        // dd($getClasses);
        Validator::make($request->all(),[
            'exam_name'=>'required',
            'class_from'=>'required',
            'class_to'=>'required',
            'medium'=>'required',
            'reporting_time'=>'required',
            'deprature_time'=>'required',
            'exam_from_time'=>'required',
            'exam_to_time'=>'required',
            'lunch_from_time'=>'required',
            'lunch_to_time'=>'required',
            'start_dt'=>'required',
            'end_dt'=>'required',
            'remark'=>'required',
            '*.date'=>'required'
        ]);
        $data = [
            'name'=>$request->exam_name,
            'class_from'=>$request->class_from,
            'class_to'=>$request->class_to,
            'medium'=>$request->medium,
            'reporting_time'=>$request->reporting_time,
            'deprature_time'=>$request->deprature_time,
            'exam_from_time'=>$request->exam_from_time,
            'exam_to_time'=>$request->exam_to_time,
            'lunch_from_time'=>$request->lunch_from_time,
            'lunch_to_time'=>$request->lunch_to_time,
            'start_dt'=>date('Y-m-d',strtotime($request->start_date)),
            'end_dt'=>date('Y-m-d',strtotime($request->end_date)),
            'remark'=>$request->remark

        ];
        $updateTimetable = ExamTimeTableMast::where('time_id',$id)->update($data);
        $delete = ExamTimeTable::where('time_id',$id)->delete();
        
        foreach($getClasses as $class){

            for($i=1; $i <= $nod ; $i++){
                $field_name = 'subject_'.$i.'_'.$class->id; 

                    $exam_time_table = [
                        'time_id'=>$id,
                        'class_id'=>$class->id,
                        'subject_id'=> $request->$field_name,
                        'date'=> date('Y-m-d',strtotime($request->date[$i-1])) 
                     ];
                     ExamTimeTable::create($exam_time_table);
                       
            }
        }
        return redirect()->route('time-table.index')->with('success','Time table updated successfully');
    }

 
    public function destroy($id)
    {
        //
    }

    public function generateTable(Request $request){

        $classFrom = $request->classFrom;
        $classTo   = $request->classTo;
        $medium   = 'EM';
        $nod       = $request->nod;

        $getClasses = studentClass::with(['assignsubject'=>function($q)use($medium){
            $q->where('medium',$medium)->with(['assign_subjectId.subject']);
        }])->whereBetween('id',[$classFrom,$classTo])->get();
        // return $getClasses;
        return view ('admin.timetables.generateTable',compact('getClasses','nod'));
    }
}
