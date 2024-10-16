<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\StudentAttendance;
use App\Models\TeacherAttendance;
use App\Helpers\Helpers;
use Arr;
use App\Models\hrms\EmployeeMast;
class AttendanceController extends Controller
{
    public function index(){
    	return view('admin.attendance.index');
    } 
    public function studentAttendance(){
    	// $data = $this->details();
    	 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
       	return view('admin.attendance.student.index',compact('classes','batches','sections','studentData'));
    }

    public function studentFetch(Request $request){

        $students = studentsMast::select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')->where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('medium',$request->medium)
                                ->get();

        $attendance_students = StudentAttendance::where('attendance_date',date('Y-m-d'))->whereIn('s_id',collect($students)->pluck('id'))->get();
    	return view('admin.attendance.student.table',compact('students','attendance_students'));
    }

    public function attendanceSubmit(Request $request){

    	if(Carbon::now()->dayName != 'Sunday'){
            $present_students = $request->present_student;
            $total_students = $request->total_student;
            $user_id = Auth::user()->id;
            $submitted_by = $user_id;

            // if(Auth::user()->hasRole('lawcollege')){
            //     $user_id = Auth::user()->id;
            //     $submitted_by = $user_id;
            // }else{
            //     $user_id = Auth::user()->parent_id;
            //     $submitted_by = Auth::user()->id;
            // }  

            $attendance = StudentAttendance::whereIn('s_id',$total_students)->where('attendance_date',date('Y-m-d'))->get();  
            if($present_students !=null){
                $absent_students = array_diff($total_students, $present_students);
            }else{
                $absent_students = $total_students;
            }


            if(count($attendance) == 0){
                $data = [
                    'user_id'         => $user_id,
                    'submitted_by'    => $submitted_by,
                    'attendance_date' => date('Y-m-d')
                ];
                foreach ($absent_students as $absent_student) {
                    $data['s_id'] = $absent_student;
                    $data['present'] = 'A';
                    StudentAttendance::create($data);
                }
                foreach ($present_students as $present_student) {       
                    $data['s_id'] = $present_student;
                    $data['present'] = 'P';
                    StudentAttendance::create($data);
                }

                // if(Auth::user()->hasRole('teacher')){
                //     $user = User::find(Auth::user()->parent_id);
                //     $message = [
                //         'id' => '',
                //         'title' => 'attendance Submit',
                //         'url' => 'attendance/dashboard',
                //         'message' => 'Students attendance submitted' 
                //     ];
                //     $user->notify(new attendanceNotifications($message));
                // }
                // $message = [
                //         'id' => '',
                //         'title' => 'attendance Submit',
                //         'url' => 'attendance/dashboard',
                //         'message' => 'Students attendance submitted' 
                //     ];
                // $user->notify(new attendanceNotifications($message));
                return 'success';
            }else{
                return "warning";
            }
        }else{
            return "sunday";
        }
    }

     public function teacherAttendance(){

     
        $users = get_teachers();
       
        $attendance_teachers = TeacherAttendance::where('attendance_date',date('Y-m-d'))->whereIn('staff_id',collect($users)->pluck('id'))->get();
    // dd($users);
        // return $attendance_teacher;
        return view('admin.attendance.teacher.index',compact('users','attendance_teachers'));
    }

    public function attendanceTeacherSubmit(Request $request){

        // dd($request);
        if(Carbon::now()->dayName != 'Sunday'){
            $present_staffs = $request->present;
            $total_staffs = $request->total;

            $attendances = TeacherAttendance::whereIn('staff_id',$total_staffs)->where('attendance_date',date('Y-m-d'))->get();  
            $user_id = Auth::user()->id;
            $submitted_by = $user_id;
            // return $attendances;
                
            // if(Auth::user()->hasRole('lawcollege')){
            //     $user_id = Auth::user()->id;
            //     $submitted_by = $user_id;
            // }else{
            //     $user_id = Auth::user()->parent_id;
                $submitted_by = Auth::user()->id;
            // }  



            if($present_staffs !=null){
                $absent_staffs = array_diff($total_staffs, $present_staffs);
            }else{
                $absent_staffs = $total_staffs;
            }

            // return $absent_students;

            if(count($attendances) == 0){
                    $data = [
                        'user_id'         => $user_id,
                        'submitted_by'    => $submitted_by,
                        'attendance_date' => date('Y-m-d')
                    ];
                foreach ($absent_staffs as $absent_staff) {
                    $data['staff_id'] = $absent_staff;
                    $data['present'] = 'A';
                    TeacherAttendance::create($data);
                }
                foreach ($present_staffs as $present_staff) {       
                    $data['staff_id'] = $present_staff;
                    $data['present'] = 'P';
                    TeacherAttendance::create($data);
                }
                // if(Auth::user()->hasRole('teacher')){
                    // $user = User::find(Auth::user()->parent_id);
                    // $message = [
                    //     'id' => '',
                    //     'title' => 'attendance Submit',
                    //     'url' => 'attendance/dashboard',
                    //     'message' => 'Staff attendance submitted' 
                    // ];
                    //  $user->notify(new attendanceNotifications($message));
                // }
                return 'success';
            }else{
                return "warning";
            }
        }else{
            return "sunday";
        }

    }
     public function TeacherFilter(Request $request){
                
        $users = get_teachers();
        // return $users;

        $attendance_staffs = TeacherAttendance::with('teacher')->where('attendance_date',$request->attendance_date)->whereIn('staff_id',collect($users)->pluck('id'))->get();
        // return $attendance_staffs;

       return view('admin.attendance.manage.teacher_table',compact('attendance_staffs'));
    }

    public function attendance_teacher_update(Request $request){
        $presents = $request->presents;
        $totals = $request->totals;
        // if(Auth::user()->hasRole('lawcollege')){
            $user_id = Auth::user()->id;
            $submitted_by = $user_id;
        // }else{
        //     $user_id = Auth::user()->parent_id;
        //     $submitted_by = Auth::user()->id;
        // }  

        $data = [
            'user_id'         => $user_id,
            'submitted_by'    => $submitted_by,
            'attendance_date' => date('Y-m-d')
        ];
        if($presents !=null){
            $absents = array_diff($totals, $presents);
        }
        else{
            $absents = $totals;
        }
            foreach ($absents as $absent) {
                $data['staff_id'] = $absent;
                $data['present'] = 'A';
                TeacherAttendance::where('staff_id',$absent)->where('attendance_date',$request->attendance_date)->update(['present' => 'A']);
            }
        if($presents !=null){
            foreach ($presents as $present) {       
                $data['staff_id'] = $present;
                $data['present'] = 'P';
                TeacherAttendance::where('staff_id',$present)->where('attendance_date',$request->attendance_date)->update(['present' => 'P']);
            }
        }

        return 'success';
        return $request->all();
    }   

    public function attendanceUpload(){
    	
    }
	public function manageStudentAttendance(){

		 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();

	   return view('admin.attendance.manage.student',compact('classes','batches','sections','studentData'));
	}
	public function attendanceStudentReport(){
         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $studentData = studentsMast::get();
        return view('admin.attendance.report.student',compact('classes','batches','sections','studentData'));
	}
	public function manageTeacherAttendance(){

		$attendance_teacher =array();
        return view('admin.attendance.manage.teacher',compact('attendance_teacher'));
	    	
	}

	public function manageStudentFilter(Request $request){

		// $students = studentsMast::select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id','medium')
		// 	->with(['attendances' => function($q){
  //               $q->first();
  //           }])->whereHas('attendances',function($q) use($request){
  //               $q->where('attendance_date',$request->attendance_date);
  //           })
  //               ->where('batch_id',$request->batch_id)
  //               ->where('std_class_id',$request->std_class_id)
  //               ->where('section_id',$request->section_id)
  //               ->where('medium',$request->medium)
  //               ->where('user_id',Auth::user()->id)
  //       		->get();
         // return $students;
         $attendances = StudentAttendance::with(['student' => function($q){
            $q->select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id','medium');
         }])->whereHas('student', function($q)use($request){
            $q->where(['std_class_id'=>$request->std_class_id,'batch_id'=>$request->batch_id,'section_id'=> $request->section_id,'medium' => $request->medium]);
         })->where('attendance_date',$request->attendance_date)->get();
         // return $attendances;
        return view('admin.attendance.manage.student_table',compact('attendances'));     
	}

	public function attendanceUpdate(Request $request){

        $present_students = $request->present_student;
        $total_students = $request->total_student;
 		$user_id = Auth::user()->id;
        $submitted_by = $user_id;
     
     // return $total_students;
        $data = [
            'user_id'         => $user_id,
            'submitted_by'    => $submitted_by,
            'attendance_date' => date('Y-m-d')
        ];
        if($present_students !=null){
            $absent_students = array_diff($total_students, $present_students);
        }
        else{
            $absent_students = $total_students;
        }
        foreach ($absent_students as $absent_student) {
            $data['s_id'] = $absent_student;
            $data['present'] = 'A';
            StudentAttendance::where('s_id',$absent_student)->where('attendance_date',$request->attendance_date)->update(['present' => 'A']);
        }
        if($present_students !=null){
            foreach ($present_students as $present_student) {       
                $data['s_id'] = $present_student;
                $data['present'] = 'P';
                StudentAttendance::where('s_id',$present_student)->where('attendance_date',$request->attendance_date)->update(['present' => 'P']);
            }
        }
        return 'success';
    
    }

    public function report_generate(Request $request){

        // return $request->all();

       $data =  $request->validate([
            'std_class_id' => 'required|not_in:""',
            'batch_id' => 'required|not_in:""',
            'section_id' => 'required|not_in:""',
            'medium' => 'required|not_in:""',
            'attendance_date' => 'required',
        ],
        [
            'std_class_id.*' => 'Class field is required', 
            
        ]
    );

        $date = $this->date_month_year($request->attendance_date);
        $month = $date['month'];
        $year = $date['year'];
        $monthStart = $date['monthStart'];
        $monthEnd = $date['monthEnd'];
     
        $students = studentsMast::with('attendances')->select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')
                    ->where('batch_id',$request->batch_id)
                    ->where('std_class_id',$request->std_class_id)
                    ->where('section_id',$request->section_id)
                    ->get();      

        $academic_dates = academic_dates($month,$year);
        $monthDates = month_dates($monthStart,$monthEnd);
    

        $headerData = [
            'monthYear' => $date['month1']->format('F, Y')
        ];

        // $qual = QualMast::find($request->qual_code);

        // return $request->all();
        $filter = [
            'class_name'    => studentClass::find($request->std_class_id)->class_name,
            'batch_name'    => studentBatch::find($request->batch_id)->batch_name,
            'section_name'  => studentSectionMast::find($request->section_id)->section_name,
            'medium_name'   => Arr::get(MEDIUM,$request->medium)
        ];  

        // return  view('attendance.report.clone',compact('monthDates','academic_dates','students','headerData','filter','data'));
        return  view('admin.attendance.report.monthly_report',compact('monthDates','academic_dates','students','headerData','filter'));

        $exportData = [
            'monthDates' => $monthDates,
            'academic_dates' => $academic_dates,
            'students' => $students,
            'headerData' => $headerData,
            'filter' => $filter,
            'data' => $data,
        ];

        return Excel::download(new StudentAttendenceExport($exportData), 'sheet.xlsx');
         
    }

    public function date_month_year($attendance_date){
        $year = date('Y',strtotime($attendance_date));
        $month = date('m',strtotime($attendance_date));   

        $month1 = Carbon::createFromFormat('Y-m', $attendance_date);
        $monthStart = $month1->startOfMonth()->copy();
        $monthEnd = $month1->endOfMonth()->copy();
        return $data = [
            'year' => $year,
            'month' => $month,
            'month1' => $month1,
            'monthStart' => $monthStart,
            'monthEnd'  => $monthEnd,
        ]; 
    }

    public function filter($request){
        $students = studentsMast::select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')
                        ->where('batch_id',$request->batch_id)
                        ->where('std_class_id',$request->std_class_id)
                        ->where('section_id',$request->section_id)
                        ->get();
        // if(Auth::user()->hasRole('lawcollege')){
            $students = $students->where('user_id',Auth::user()->id);
        // }else{
        //     $students = $students->where('user_id',Auth::user()->parent_id);
        // }       
        return $students;
    }


    public function attendance_teacher_report(){
        
        return view('admin.attendance.report.teacher');
    }

     public function teacher_report_generate(Request $request){
        $date = $this->date_month_year($request->attendance_date);
        $month = $date['month'];
        $year = $date['year'];
        $monthStart = $date['monthStart'];
        $monthEnd = $date['monthEnd'];
        
        $users = EmployeeMast::with(['attendances' => function($query) use ($year, $month){
            $query->whereYear('attendance_date',$year)->whereMonth('attendance_date',$month);
        }])->where('emp_type','T')->get();
       
        // $users = $usersData->where('parent_id',Auth::user()->id)->get();

        $academic_dates = academic_dates($month,$year);
        $monthDates = month_dates($monthStart,$monthEnd);

        $headerData = [
            'monthYear' => $date['month1']->format('F, Y')
        ];

       
        return  view('admin.attendance.report.teacher_monthly_report',compact('monthDates','academic_dates','users','headerData'));

        
    }
}
