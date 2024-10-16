<?php

namespace App\Http\Controllers\Admin\students;

use Auth;
use File;
use Helpers;
use App\User;
use App\Mail\UserNamePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\ClassBatchSectionGroupMast;
use App\Models\student\studentsGuardiantMast;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\castCategory;
use App\Models\master\stdReligions;
use App\Models\master\stdBloodGroup;
use App\Models\master\stdNationality;
use App\Models\master\countryMast;
use App\Models\master\stateMast;
use App\Models\master\cityMast;
use App\Models\master\mothetongueMast;
use App\Models\student\StudenstDoc;
use App\Models\master\professionType;
use App\Models\master\guardianDesignation;
use App\Models\sendmessage\SendMessage;
use App\Models\AssignSubjectGroupStudent;
use Carbon\Carbon;
use Arr;
use App\Models\student\StudentMastPrevReocrd;
use App\Models\student\StudentSiblings;
use App\Models\transport\BusFeeStructure;
use App\Models\hrms\EmployeeMast;
use Illuminate\Support\Str;
use App\MessageSend;
use App\Models\setting\Settings;

class studentController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
        
         $this->classes = studentClass::get();
         $this->studentNationalites   = stdNationality::get();
         $this->studentMothertongues  = mothetongueMast::get();
         $this->professionType       = professionType::get();
         $this->guardianDesignation   = guardianDesignation::get();

    }
    public function index()
    {
        $classes = $this->classes;
        return view('admin.students.index',compact('classes'));
    }

    
    public function create()
    {

        $classes = $this->classes;
        $studentMothertongues  = $this->studentMothertongues;
        $professionType       = $this->professionType;
        $guardianDesignation   = $this->guardianDesignation;
        $studentNationalites   = $this->studentNationalites;

        $students = studentsMast::select('id','admision_no','f_name','m_name','l_name')->where('status','R')->get();

        $bus_fees = BusFeeStructure::where('bus_fee_status','A')->get();
        return view('admin.students.create',compact('classes','studentNationalites','studentMothertongues','professionType','guardianDesignation','students','bus_fees'));

    }
    
    
    public function store(Request $request)
    {
        $adm = studentsMast::orderBy('id', 'desc')->pluck('admision_no')->first();
        $sch = $adm + 1;
        // return $request->all();
        $data = $this->validation($request);

        if($request->hasFile('s_photo')){
            $data['photo'] =  file_upload($request->s_photo,'student_profile');
        }

        $account_create = [
            'username' => $request->username,
            'name' => $request->f_name.($request->m_name !=null ? ' '.$request->m_name : '' )." ". $request->l_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),            
            'user_flag'  => 'S',
            'mobile_no'  => $request->s_mobile,
            'status'    => 'A'
        ];


        $user =   User::create($account_create);  
        $user->attachRole('3');

        $data['user_id'] = $user->id;
        $data['scholar_no'] = $sch;

        $data['is_fees_assign'] = isset($request->is_fees_assign) ? $request->is_fees_assign : 0;
        $student  = studentsMast::create($data);

        //Student Guardians Details Create

        foreach ($request->relation as $key => $relation) {
            $guardian = [
                'relation_id'  => $relation,
                'g_name'       => $request->g_name[$key],
                'g_mobile'       => $request->g_mobile[$key],
                'work_status'       => $request->work_status[$key],
                'employment_type'       => $request->employment_type[$key],
                'profession_status'       => $request->profession_status[$key],
                'employer'       => $request->employer[$key],
                'designation'       => $request->designation_id[$key],
                's_id'       => $student->id
            ];
            if($request->hasFile('g_photo.'.$key)){
                $guardian['photo'] =  file_upload($request->g_photo[$key],'student_guard');
            }

            studentsGuardiantMast::create($guardian);
        }

        //Student document create
        foreach ($request->doc_title as $key => $doc_title) {
            $docs = [
                'doc_title'         => $doc_title,
                'doc_description'   => $request->doc_description[$key],
                's_id'       => $student->id
            ];

            if($request->hasFile('student_doc.'.$key)){
               // dd($request->student_doc[$key]);
                $docs['student_doc'] =  file_upload($request->student_doc[$key],'student_doc');
            }
            StudenstDoc::create($docs);
        }


        //Student sibligs create
        if($request->siblings !=null){
            foreach ($request->siblings as $key => $sibling) {
                $siblings = [
                    's_id'                  =>  $student->id,
                    'sibling_admission_no'  =>  $sibling,
                    'sibling_no'            =>  $key + 1,
                    'status'                => 'A'
                ];

                StudentSiblings::create($siblings);
            }

            $student_fetch = studentsMast::select('id','gender','dob','staff_ward','staff_id','bus_fee_id','age','std_class_id')->with(['siblings.sibling_detail'])->find($student->id);

            $sibling_no = null;
            $dates[] = $request->dob;  
            foreach ($student_fetch->siblings as $std_sib) {
                $dates[] = $std_sib->sibling_detail->dob;
            }
            foreach ($dates as $date) {
                $str_time[] = strtotime($date);
            }
           
            asort($str_time);

            foreach ($str_time as $value) {
                $str_date[] = date('Y-m-d',$value);
            }
            foreach ($str_date as $i => $dt) {
                if($dt == $request->dob){
                    $sibling_no = $i+1;
                }
            }
            $student_fetch->update(['sibling'=>$sibling_no]);
        }

        if(isset($request->is_fees_assign)){
            student_fee_assign($student);
        }
        // $sendMessage = [
        //     'mobile'    => (int)$request->s_mobile,
        //     'message'   => 'Welcome to '.SCHOOLNAME.' your username is '.$request->username.' and password is '.$password,
        // ];
        // MessageSend::sendMessage($sendMessage);

        return redirect()->back()->with('success','Student added successfully');

    }

    
    public function show($id)
    {

        $student = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail','staff_detail'])->where('id',$id)->first();
        // return $student;
        // dd( $student);
        $sibling_name =[];
        foreach ($student->siblings as $sibling) {
            if($sibling->sibling_detail !=null){
                $sibling_name[] = $sibling->sibling_detail->admision_no.' | '.student_name($sibling->sibling_detail);
            }
        }
        $sibling_name =  implode(', ', $sibling_name);
       
        $bus_fees = BusFeeStructure::where('bus_fee_status','A')->where('bus_fee_id',$student->bus_fee_id)->first();
        // dd( $bus_fees);
        return view('admin.students.show',compact('student','sibling_name','bus_fees'));
    }

    
    public function edit($id)
    {
        $classes = $this->classes;
        $studentMothertongues  = $this->studentMothertongues;
        $professionType       = $this->professionType;
        $guardianDesignation   = $this->guardianDesignation;

        $studentNationalites   = $this->studentNationalites ;


        $students = studentsMast::select('id','admision_no','f_name','m_name','l_name')->where('status','R')->whereNotIn('id',[$id])->get();
        // return $students;

        $student = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast','student_doc','stdNationality','mothetongueMast'])->where('id',$id)->first();
        $studentSiblings = StudentSiblings::where('s_id',$id)->pluck('sibling_admission_no');
        // return $studentSiblings;
        $bus_fees = BusFeeStructure::where('bus_fee_status','A')->get();
         // return $bus_fees;
        return view('admin.students.edit',compact('classes','studentNationalites','studentMothertongues','professionType','guardianDesignation','student','students','studentSiblings','bus_fees'));

    }

    
    public function update(Request $request, $id)
    {
        $data = $this->validation($request,$id);
    

        $student = studentsMast::with(['studentsGuardiantMast','student_doc'])->where('id',$id)->first();
      

        if($request->hasFile('s_photo')){
            $data['photo'] =  file_upload($request->s_photo,'student_profile','photo',$student);
        }
        // return $request->g_id;
       

        $student->update($data);
        

        foreach ($request->relation as $key => $relation) {
            $guardianInfo = [];
            $guardian = [
                'relation_id'  => $relation,
                'g_name'       => $request->g_name[$key],
                'g_mobile'     => $request->g_mobile[$key],
                'work_status'  => $request->work_status[$key],
                'employment_type'=> $request->employment_type[$key],
                'profession_status'=> $request->profession_status[$key],
                'employer'       => $request->employer[$key],
                'designation'    => $request->designation_id[$key],
                's_id'           => $id
            ];

            if($request->g_id[$key] !=null){
                $guardianInfo = studentsGuardiantMast::find($request->g_id[$key]);
            }

            if($request->hasFile('g_photo.'.$key)){

                $guardian['photo'] =  file_upload($request->g_photo[$key],'student_guard','photo',$guardianInfo);
            }

            if(!empty($guardianInfo)){
                $guardianInfo->update($guardian);
            }else{
                studentsGuardiantMast::create($guardian);
            }
        }

        foreach ($request->doc_title as $key => $doc_title) {
            $docs = [
                'doc_title'         => $doc_title,
                'doc_description'   => $request->doc_description[$key],
                's_id'       => $id
            ];
            if($request->student_doc_id[$key] !=null){
                $studentdocs = StudenstDoc::find($request->student_doc_id[$key]);
            }else{
                $studentdocs = [];
            }

            if($request->hasFile('student_doc.'.$key)){
                $docs['student_doc'] =  file_upload($request->student_doc[$key],'student_doc','student_doc',$studentdocs);
            }

            if(!empty($studentdocs)){
                $studentdocs->update($docs);
            }else{
                StudenstDoc::create($docs);
            }

        }


        $fordeleteGaurdian = studentsGuardiantMast::where('s_id',$id)->whereNotIn('id',$request->g_id)->get();

        foreach ($fordeleteGaurdian as $deleteGaurdian) {
            if($deleteGaurdian->photo !=null){
                Storage::delete('public/'.$deleteGaurdian->photo);
            }
                studentsGuardiantMast::find($deleteGaurdian->id)->delete();
        }

        $fordeleteDocs = StudenstDoc::where('s_id',$id)->whereNotIn('id',$request->student_doc_id)->get();

        foreach ($fordeleteDocs as $deleteDocs) {
            if($deleteDocs->student_doc !=null){
                Storage::delete('public/'.$deleteDocs->student_doc);
            }
                StudenstDoc::find($deleteDocs->id)->delete();
        }

            StudentSiblings::where('s_id',$id)->delete();
        if($request->siblings !=null){
            foreach ($request->siblings as $key => $sibling) {
                $siblings = [
                    's_id'                  =>  $student->id,
                    'sibling_admission_no'  =>  $sibling,
                    'sibling_no'            =>  $key + 1,
                    'status'                => 'A'
                ];
                StudentSiblings::create($siblings);
            }

        }
        
        return redirect()->back()->with('success','Student Updated successfully');

    }

    
    public function destroy($id)
    {
        //
    }

    public function validation($request,$id=null){

        $request->validate(
            [
                'std_class_id'        => 'required|not_in:""',
                'batch_id'            => 'required|not_in:""',
                'section_id'          => 'required|not_in:""',
                'medium'              => 'required|not_in:""',
                'admision_no'         => 'required|unique:students_masts,admision_no,'.$id,
                'f_name'              => 'required',
                'l_name'              => 'required',
                's_mobile'            => 'required',
                'dob'                 => 'required',
                'birth_place'         => 'nullable',
                'email'               => 'nullable',
                'gender'              => 'required|not_in:""',
                'reservation_class_id'=> 'required|not_in:""',
                'p_address'           => 'required|min:3|max:191',
                'p_city'              => 'required|min:3|max:30',
                'p_state'             => 'required|min:3|max:25',
                'p_country'           => 'required|min:3|max:57',
                'p_zip_code'          => 'required|min:6|max:7',

                'l_address'           => 'required|min:3|max:191',
                'l_city'              => 'required|min:3|max:30',
                'l_state'             => 'required|min:3|max:25',
                'l_country'           => 'required|min:3|max:57',
                'l_zip_code'          => 'required|min:6|max:7',
                'staff_ward'        => 'required|not_in:""'

            ],
            [
                'std_class_id.*'    => 'The selected student class is invalid.',
                'batch_id.*'        => 'The selected batch is invalid.',
                'section_id.*'      => 'The selected section is invalid.',
                'f_name.*'          => 'The first name field is required.',
                'l_name.*'          => 'The last name field is required.',
                's_mobile.*'        => 'The mobile field is required.',
            ]
        );

        $data = [
            'std_class_id'  => $request->std_class_id,
            'batch_id'      => $request->batch_id,
            'section_id'    => $request->section_id,
            'medium'        => $request->medium,
            'admision_no'   => $request->admision_no,
            'addm_date'     => $request->addm_date,
            'roll_no'       => $request->roll_no,
            'status'        => $request->status,
            'f_name'        => $request->f_name,
            'm_name'        => $request->m_name,
            'l_name'        => $request->l_name,
            'passout_date'  => $request->passout_date,
            's_mobile'      => $request->s_mobile,
            'dob'           => $request->dob,
            'birth_place'   => $request->birth_place,
            'email'         => $request->email,
            'gender'        => $request->gender,
            'reservation_class_id'=> $request->reservation_class_id,
            'religion_id'   => $request->religion_id,
            'blood_id'      => $request->blood_id,
            'spec_ailment'  => $request->spec_ailment,
            'age'           => $request->age,
            'nationality_id'=> $request->nationality_id,
            'taluka'        => $request->taluka,
            'language_id'   => $request->language_id,
            's_ssmid'       => $request->s_ssmid,
            'f_ssmid'       => $request->f_ssmid,
            'aadhar_card'   => $request->aadhar_card,
            'staff_ward'    => $request->staff_ward,
            'cbsc_reg'      => $request->cbsc_reg,
            'prev_school'   => $request->prev_school,
            'year_of_prev_school'=> $request->year_of_prev_school,
            'prev_school_address'=> $request->address,
            'acadmic_city'  => $request->acadmic_city,
            'acadmic_state' => $request->acadmic_state,
            'acadmic_pin'   => $request->acadmic_pin,
            'acadmic_country'=> $request->acadmic_country,
            'cast'          => $request->cast,
            'cast_cert_no'  => $request->cast_cert_no,
            'acadmic_attendance_reg_no'=> $request->acadmic_attendance_reg_no,
            'acadmic_remark'=> $request->acadmic_remark,
            'p_address'     => $request->p_address,
            'p_city'        => $request->p_city,
            'p_state'       => $request->p_state,
            'p_zip_code'    => $request->p_zip_code,
            'p_country'     => $request->p_country,
            'same_as'       => $request->same_as =='on' ? '1' :'0',
            'l_address'     => $request->p_address,
            'l_city'        => $request->p_city,
            'l_state'       => $request->p_state,
            'l_zip_code'    => $request->p_zip_code,
            'l_country'     => $request->p_country,
            'bank_name'     => $request->bank_name,
            'bank_branch'   => $request->bank_branch,
            'account_name'  => $request->account_name,
            'account_no'    => $request->account_no,
            'ifsc_code'     => $request->ifsc_code,
            'family_income' => $request->family_income           

        ];

        if($request->staff_ward == '1'){
            $data['staff_id'] = $request->staff_id;
        }

        if($request->bus_fee_allocate == '1'){
            $request->validate([
                'bus_fee_id' => 'required|not_in:""',
            ]);
            $data['bus_fee_id'] = $request->bus_fee_id;
        }else{
            $data['bus_fee_id'] = null;            
        }
        return $data;
    }

    public function studentDashboard(){

        return view('admin.students.dashboard');
        
    }
    public function studentDetail(){

        return view('admin.students.student-details.index');

    }

    public function student_filter(Request $request){

        $page = request()->page; 
        // return $page;
        if($page == 'basic_data_fetch'){
// dd($request->all());
            $students = studentsMast::where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>$request->status])->orderBy('f_name')->get();

// dd($students);
            return view('admin.fees.student_list_table',compact('students'));
            
        }else{
            if($request->status == 'D' || $request->status == 'R'){
                $students = studentsMast::with(['student_class'])->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>$request->status])->get();
                    return view('admin.students.table',compact('students','page'));
                }else{
                    // return $request->all();
                    $students = StudentMastPrevReocrd::with('student_detail')->whereHas('student_detail',function($q)use($request){
                        $q->where(['medium'=> $request->medium]);
                    })->has('student_detail')->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'status'=>$request->status])->get();
                    // return $students;
                    return view('admin.students.previous-student-detail.table',compact('students'));
                }
        }

    }

// get city state country..............................
    public function getState(Request $request){
        $id =$request->country_id;
        $getState = stateMast::where('country_id', $id)->get();
        return response()->json($getState);
    } 
    public function getCity(Request $request){
        $id =$request->state_id;
        $getCity = cityMast::where('state_id', $id)->get();
            return response()->json($getCity);
    }

    public function getAcadmicState(Request $request){
        $id =$request->state_id;
        $getState = stateMast::where('id', $id)->get();
            return response()->json($getState);
    } 
    public function getAcadmicCountry(Request $request){
         $id = $request->country_id;
         $getCountry = countryMast::where('id', $id)->get();
            return response()->json($getCountry);
    }

    // get previous student details......................
    public function previousStudentRecord(){
        $classes = $this->classes;  

        return view('admin.students.previous-student-detail.index',compact('classes'));
    }

    // get previous student details......................
    public function studentsManage(){
        $classes = $this->classes;
        // $page = 'student_manage';
        return view('admin.students.student-manage.index',compact('classes'));
    }

    //  students Manage Get Data student details......................
    public function studentsManageGetData(Request $request){
 
        $students = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
        $page = 'student_manage';
        return view('admin.students.table',compact('students','page'));
    }

     // get previous student details......................
    public function studentUploads(){
        $classes = $this->classes;        
        return view('admin.students.student-import-export.index',compact('classes'));
    }

    public function userProfile(){
        $user = Auth::user();
        // dd($user);
        return view('admin.profile.index',compact('user'));
    }
    public function editProfile($id){
        $getUserData = User::find($id);
        return view('admin.profile.edit',compact('getUserData'));
    }
    public function updateProfile(Request $request){
        dd($request);
    }

    public function student_basic_detls_fetch(Request $request){

    }
    public function getBusFeeAmt(Request $request){

        $bus_fees_amt = BusFeeStructure::where('bus_fee_status','A')->where('bus_fee_id', $request->bus_fee_id)->first();
        // dd($bus_fees_amt);
        return response()->json($bus_fees_amt);
    }
    public function printStudentInfo($id){

       $student = studentsMast::with(['student_class','student_batch','student_section','studentsGuardiantMast.profession_type','studentsGuardiantMast.guardian_designation','student_doc','stdNationality','mothetongueMast','siblings.sibling_detail','staff_detail'])->where('id',$id)->first();
// dd($student);
        // return $student;
        $sibling_name =[];
        foreach ($student->siblings as $sibling) {
            if($sibling->sibling_detail !=null){
                $sibling_name[] = $sibling->sibling_detail->admision_no.' | '.student_name($sibling->sibling_detail);
            }
        }
        $sibling_name =  implode(', ', $sibling_name);
       
        $bus_fees = BusFeeStructure::where('bus_fee_status','A')->where('bus_fee_id',$student->bus_fee_id)->first();
        $settings = Settings::first();
        // dd( $bus_fees);
        return view('admin.students.print_student_info',compact('student','sibling_name','bus_fees','settings'));
    }
    



   

}
