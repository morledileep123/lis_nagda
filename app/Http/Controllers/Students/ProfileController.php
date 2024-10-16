<?php

namespace App\Http\Controllers\Students;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\countryMast;
use App\Models\master\stateMast;
use App\Models\master\cityMast;
use App\Models\student\studentsMast;
use Arr;
use Carbon\Carbon;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
class ProfileController extends Controller
{
 public function __construct()
    {
         $this->middleware('auth');
         $this->country   = countryMast::get();
         $this->state     = stateMast::get();
         $this->city      = cityMast::get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->student_id;
        $user = studentsMast::find($id);
        // dd($user);
        return view('students.profile.index',compact('user'));
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
        //
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
       
        $getUserData = studentsMast::find($id);
        // dd($getUserData);
        return view('students.profile.edit',compact('getUserData'));
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
        $data = [
            'mobile_no' => $request->mobile,
            'name' => $request->name
        ];
        if($request->photo !=null){
            $verify = $request->validate([
                'photo' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
                $data['photo'] =  file_upload($request->photo,'student_profile');
                $studentsMast['photo'] = $data['photo'];
            }else{
            
            $getProfile = studentsMast::find($id);
            // dd($getProfile);
            $studentsMast['photo'] = $getProfile->photo;
            $getUser = user::where('student_id',$id)->first();
            $data['photo'] = $getUser->photo;
        }
        $studentsMast['dob'] = $request->dob;
        $studentsMast['s_mobile'] = $request->mobile;
        $studentsMast['optional_mobile_number'] = $request->alternative_mo_no;
        $studentsMast['photo'];

        $update = studentsMast::where('id',$id)->update($studentsMast);
        user::where('student_id',$id)->update($data);

        return redirect()->back()->with('success','Profile Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showProfile(){
        $id = Auth::user()->id;
        $student = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail'])->where('user_id',$id)->first();
        // dd($student);
        $sibling_name =[];
        if (!empty($student->siblings)) {
        foreach ($student->siblings as $sibling) {
            if($sibling->sibling_detail !=null){
                $sibling_name[] = $sibling->sibling_detail->admision_no.' | '.student_name($sibling->sibling_detail);
            }
        }
        $sibling_name =  implode(', ', $sibling_name);
        }else{
            $sibling_name =  '';

        }

        return view('students.profile.show',compact('student','sibling_name'));

    }

    public function showAttendence(){
        return view('students.attendance.index');
    }
    public function viewAttendence(Request $request){
       // dd($request);
        $date = $this->date_month_year($request->attendance_date);
        $month = $date['month'];
        $year = $date['year'];
        $monthStart = $date['monthStart'];
        $monthEnd = $date['monthEnd'];
     
        $students = studentsMast::where('user_id',Auth::user()->id)->with('attendances')->select('id','f_name','l_name','roll_no','std_class_id','batch_id','section_id')->get();      
        $academic_dates = academic_dates($month,$year);
        $monthDates = month_dates($monthStart,$monthEnd);
    

        $headerData = [
            'monthYear' => $date['month1']->format('F, Y')
        ];

        $filter = [
            'class_name'    => studentClass::find($students[0]->std_class_id)->class_name,
            'batch_name'    => studentBatch::find($students[0]->batch_id)->batch_name,
            'section_name'  => studentSectionMast::find($students[0]->section_id)->section_name,
            'medium_name'   => Arr::get(MEDIUM,$request->medium)
        ];  
       
        return view('students.attendance.show',compact('monthDates','academic_dates','students','headerData','filter'));
    }
    public function date_month_year($attendance_date){
        $year = date('Y',strtotime($attendance_date));
        $month = date('m',strtotime($attendance_date));   

        $month1 = Carbon::createFromFormat('Y-m', date('Y-m',strtotime($attendance_date)));

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

     public function getStudentIdCard(){

        $stdId = studentsMast::where('user_id',Auth::user()->id)->first();
        $student = studentsMast::with('student_class','student_batch')->where('admision_no',$stdId->admision_no)->first();
        if(!empty($student)){
           return view('students.id-card.index',compact('student'));
        }else{
            return "error";
        }

    }
}
