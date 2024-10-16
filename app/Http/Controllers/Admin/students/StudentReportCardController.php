<?php

namespace App\Http\Controllers\Admin\students;

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
use App\Models\student\studentsMast;
use App\Models\student\ReportCardMast;
use App\Models\student\ReportCard;
use App\Models\master\ReportCardHeader;
use Auth;
use App\Models\setting\Settings;
use Config;
use PDF;
use Illuminate\Http\Response;
// use App\Models\master\Subject;
class StudentReportCardController extends Controller
{
  
    public function index()
    {
     $classes = studentClass::get();
     $reportCardMasts = ReportCardMast::with('student_info','student_info.student_class')->get();
       // dd($reportCardMasts);

        return view ('admin.students.student-report-card.index',compact('reportCardMasts','classes'));
    }

    public function reportgenerate(Request $request)
    {

     $classes = studentClass::get();
     $reportCardMasts = ReportCardMast::with('student_info','student_info.student_class')->get();
       // dd($reportCardMasts);

        return view ('admin.students.student-report-card.report',compact('reportCardMasts','classes'));
    }

   
    public function create()
    {
        // dd('ss');
        $class = studentClass::get();
        $assignSubject = AssignSubjectToClass::with(['assign_subjectId'])->where('batch_id',7)->get();
        // return $assignSubject;
        // dd($assignSubject);
        return view ('admin.students.student-report-card.create',compact('class'));
        
    }

   
    public function store(Request $request)
    {                
        // dd($request->all());


        $data = [
            'std_class_id'=>$request->std_class_id,
            'batch_id'=>$request->batch_id,
            'section_id'=>$request->section_id,
            'medium'=>$request->medium,
            'student_id'=>$request->student_id,
            'work_education'=>$request->work_education,
            'work_education2'=>$request->work_education2,
            'art_education'=>$request->art_education,
            'art_education2'=>$request->art_education2,
            'health_phsl'=>$request->health_phsl,
            'attendance'=>$request->attendance,
            'total_working_day'=>$request->total_working_day,
            'total_presentd_days'=>$request->total_presentd_days,
            'attendance1'=>$request->attendance1,
            'total_working_day2'=>$request->total_working_day2,
            'grading_scale'=>$request->grading_scale,
            'grading_scale2'=>$request->grading_scale2,
            'remark'=>$request->remark,
            'prd_to_class'=>$request->prd_to_class,
            'Place'=>$request->Place,
            'grand_total'=>$request->grand_total,
            'report_card_type'=>$request->report_card_type,
            'date'=>date('Y-m-d',strtotime($request->date))
            

        ];
        // if ($request->class_section_name !='Nursery(A)_to_KG-II(A)') {
            
            $findcomanData = ReportCardMast::where(['std_class_id'=>$request->std_class_id,'batch_id'=>$request->batch_id,'section_id'=>$request->section_id,'medium'=>$request->medium,'student_id'=>$request->student_id,'medium'=>$request->medium,'report_card_type'=>$request->report_card_type])->get();
           
           if (count($findcomanData) >0) {
                return redirect()->back()->with('warning','This Report card already added');
           }else{
                $lastId = ReportCardMast::create($data)->id;
                foreach($request->marks_grade as  $key => $marks_grade){
                    
                    $marks_grade = [
                        'report_card_mast_id'=>$lastId,
                        'marks_grade'=>$marks_grade,
                        'subject_id'=> $request->subject_id[$key],
                        'student_id'=>$request->student_id,
                        'report_card_type'=>$request->report_card_type
                     ];
                    
                     ReportCard::create($marks_grade);
                }
                return redirect()->route('student-report-card.index')->with('success','student-report-card added successfully');
            }
            // }elseif($request->class_section_name =='Nursery(A)_to_KG-II(A)'){
            // dd($request->all());

            // }

    }

    public function show($id)
    {

        $reportCardMasts = ReportCardMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','report_card'])->where('id',$id)->first();
        // dd($reportCardMasts);
// return $reportCardMasts;
        $students = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail','staff_detail'])->where(['id'=>$reportCardMasts->student_id])->orderBy('f_name')->first();
         
        $reportCardHeaders = ReportCardHeader::with('report_card_headre','subjects_name')
                        ->where('std_class_from_id','<=', (int)$reportCardMasts->std_class_id)
                        ->where('std_class_to_id','>=',(int)$reportCardMasts->std_class_id)
                        ->first();
         Config::set('section_id', $reportCardMasts->section_id);
         Config::set('batch_id', $reportCardMasts->batch_id);
        $getClasses = studentClass::with(['assignsubject'=>function($q){
            $q->where('section_id',Config::get('section_id'))
              ->where('batch_id',Config::get('batch_id'))
              ->with(['assign_subjectId.subject.subsubjects','assign_subjectId.subject.subsubjects.subsubjects']);
            }])
            ->whereBetween('id',[$reportCardHeaders->std_class_from_id,$reportCardHeaders->std_class_to_id])
            ->first();
        
        
        $settings = Settings::where('user_id',Auth::user()->id)->first();
// dd( $getClasses);

// return $reportCardMasts->report_card ;
       return view('admin.students.student-report-card.show',compact('students','reportCardHeaders','getClasses','settings','reportCardMasts'));


    }

   
    public function edit($id)
    {

     $reportCardMasts = ReportCardMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','report_card'])
        ->where('id',$id)
        ->first();

        $students = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail','staff_detail'])
          ->where(['id'=>$reportCardMasts->student_id])
          ->orderBy('f_name')
          ->first();
         
        $reportCardHeaders = ReportCardHeader::with('report_card_headre','subjects_name')->where('std_class_from_id','<=', (int)$reportCardMasts->std_class_id)->where('std_class_to_id','>=',(int)$reportCardMasts->std_class_id)->first();

         Config::set('section_id', $reportCardMasts->section_id);
         Config::set('batch_id', $reportCardMasts->batch_id);
        $getClasses = studentClass::with(['assignsubject'=>function($q){
            $q->where('section_id',Config::get('section_id'))
              ->where('batch_id',Config::get('batch_id'))
              ->with(['assign_subjectId.subject']);
            }])
            ->whereBetween('id',[$reportCardHeaders->std_class_from_id,$reportCardHeaders->std_class_to_id])
            ->first();
        
        $settings = Settings::where('user_id',Auth::user()->id)->first();

       return view('admin.students.student-report-card.edit',compact('students','reportCardHeaders','getClasses','settings','reportCardMasts'));

        
    }

   
    public function update(Request $request, $id)
    {

// dd($request->all());
         $data = [
            // 'std_class_id'=>$request->std_class_id,
            // 'batch_id'=>$request->batch_id,
            // 'section_id'=>$request->section_id,
            // 'medium'=>$request->medium,
            // 'student_id'=>$request->student_id,
            'work_education'=>$request->work_education,
            'work_education2'=>$request->work_education2,
            'art_education'=>$request->art_education,
            'art_education2'=>$request->art_education2,
            'health_phsl'=>$request->health_phsl,
            'attendance'=>$request->attendance,
            'total_working_day'=>$request->total_working_day,
            'total_presentd_days'=>$request->total_presentd_days,
            'attendance1'=>$request->attendance1,
            'total_working_day2'=>$request->total_working_day2,
            'grading_scale'=>$request->grading_scale,
            'grading_scale2'=>$request->grading_scale2,
            'remark'=>$request->remark,
            'prd_to_class'=>$request->prd_to_class,
            'Place'=>$request->Place,
            'grand_total'=>$request->grand_total,
            'date'=>date('Y-m-d',strtotime($request->date))
            

        ];
        // dd($data);
        // $lastId = 1;
        $lastId = ReportCardMast::where('id',$id)->update($data);

        foreach($request->marks_grade as  $key => $marks_grade){
            // for($i=1; $i <= $nod ; $i++){
                // $field_name = 'subject_'.$i.'_'.$marks_grade->id; 
                    $marks_grade1 = [
                        'marks_grade'=>$marks_grade
                     ];
                     ReportCard::where('subject_id',$request->subject_id[$key])
                                ->where('id',$request->report_cards_title_id[$key])
                                ->update($marks_grade1);
            // }
        }
        return redirect()->back()->with('success','student-report-card updated successfully');


      
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
// dd('sa');   
        $getClasses = studentClass::with(['assignsubject'=>function($q)use($medium){
            $q->where('medium',$medium)->with(['assign_subjectId.subject']);
        }])->whereBetween('id',[$classFrom,$classTo])->get();
        // return $getClasses;
        return view ('admin.timetables.generateTable',compact('getClasses','nod'));
    }
    public function getStdForRepCrd(Request $request){
// dd('sadh');
        $page = request()->page; 
        if($page == 'student_detail'){
            // dd($request->all());
            $students = studentsMast::where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>$request->status])
            ->orderBy('f_name')
            ->get();
        // dd($students);
            // return view('admin.fees.student_list_table',compact('students'));
            return  $students;
            
        }else{
            if($request->status == 'D' || $request->status == 'R'){
            $students = studentsMast::with(['student_class'])->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>$request->status])->get();
                return $students;
                // return view('admin.students.table',compact('students','page'));
            }else{
                $students = StudentMastPrevReocrd::with('student_detail')->whereHas('student_detail',function($q)use($request){
                    $q->where(['medium'=> $request->medium]);
                })->has('student_detail')->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'status'=>$request->status])->get();
                // return view('admin.students.previous-student-detail.table',compact('students'));
                return $students;
            }
        }

    }
    public function getStdDtlRepCrd(Request $request){

        $students = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail','staff_detail'])
                ->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>$request->status, 'id'=>$request->user_id])
                ->orderBy('f_name')
                ->first();
         
         // dd($request->repCardtype);
        $reportCardHeaders = ReportCardHeader::with('report_card_headre','subjects_name')
                    ->where('report_card_type',$request->repCardtype)
                    ->where('section_id',$request->section_id)
                    ->Where('std_class_from_id','<=', (int)$students->std_class_id)
                    ->Where('std_class_to_id','>=',(int)$students->std_class_id)
                    ->first();

// dd($students->repCardtype);

       

       Config::set('section_id', $request->section_id);
       Config::set('batch_id', $request->batch_id);

        $getClasses = studentClass::with(['assignsubject'=>function($q){
            $q->where('section_id',Config::get('section_id'))
              ->where('batch_id',Config::get('batch_id'))
              ->with(['assign_subjectId.subject.subsubjects','assign_subjectId.subject.subsubjects.subsubjects']);
            }])
            ->whereBetween('id',[$reportCardHeaders->std_class_from_id,$reportCardHeaders->std_class_to_id])
            ->first();
        
        $settings = Settings::where('user_id',Auth::user()->id)->first();
        $classes = studentClass::get();
       return view('admin.students.student-report-card.templat',compact('students','reportCardHeaders','getClasses','settings','classes'));

    }

    public function reportCardFilter(Request $request){

        $classes = studentClass::get();
        $reportCardMasts = ReportCardMast::with('student_info','student_info.student_class')
                        ->where(['batch_id'=>$request->batch_id, 
                                 'std_class_id' => $request->std_class_id, 
                                 'section_id' => $request->section_id, 
                                 'medium'=> $request->medium, 
                                 'report_card_type'=> $request->report_card_type
                              ])
                        ->get();
        // dd($reportCardMasts);
        return view ('admin.students.student-report-card.report_card_filter',compact('reportCardMasts','classes'));
    }

    public function admnoFilter(Request $request){
        $admid = $request->admision_no;
        $studid = studentsMast::where('admision_no', $admid)->pluck('id');
        $classes = studentClass::get();
        $reportCardMasts = ReportCardMast::with('student_info','student_info.student_class')
                        ->whereIn('student_id',$studid)->get();
        // dd($reportCardMasts);
        return view ('admin.students.student-report-card.report_card_filter',compact('admid','studid','reportCardMasts','classes'));
    }

     public function createPDF($id) {
      // retreive all records from db
      $reportCardMasts = ReportCardMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','report_card'])->where('id',$id)->first();
// return $reportCardMasts;
        $students = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail','staff_detail'])->where(['id'=>$reportCardMasts->student_id])->orderBy('f_name')->first();
         
        $reportCardHeaders = ReportCardHeader::with('report_card_headre','subjects_name')
                        ->where('std_class_from_id','<=', (int)$reportCardMasts->std_class_id)
                        ->where('std_class_to_id','>=',(int)$reportCardMasts->std_class_id)
                        ->first();
         Config::set('section_id', $reportCardMasts->section_id);
         Config::set('batch_id', $reportCardMasts->batch_id);
        $getClasses = studentClass::with(['assignsubject'=>function($q){
            $q->where('section_id',Config::get('section_id'))
              ->where('batch_id',Config::get('batch_id'))
              ->with(['assign_subjectId.subject.subsubjects','assign_subjectId.subject.subsubjects.subsubjects']);
            }])
            ->whereBetween('id',[$reportCardHeaders->std_class_from_id,$reportCardHeaders->std_class_to_id])
            ->first();
        
        
        $settings = Settings::where('user_id',Auth::user()->id)->first();
// dd( $settings);

// return $reportCardMasts->report_card ;
       // return view('admin.students.student-report-card.show',compact('students','reportCardHeaders','getClasses','settings','reportCardMasts'));
      // share data to view
      // view()->share('employee',$reportCardHeaders);
      $pdf = PDF::loadView('admin.students.student-report-card.pdf',compact('students','reportCardHeaders','getClasses','settings','reportCardMasts'));
// dd($pdf);
      // download PDF file with download method

      return $pdf->download('report_card.pdf');
    }
}

