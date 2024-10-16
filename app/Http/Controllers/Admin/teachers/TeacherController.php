<?php

namespace App\Http\Controllers\Admin\teachers;

use Auth;
use App\User;
use App\Mail\UserNamePassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\teachers\Teacher;
use App\Models\master\Subject;
use App\Models\teachers\AssignSubjectToTeacher;
use App\Models\teachers\AssignSubIdToTeacher;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\sendmessage\SendMessage;
use App\Models\hrms\EmployeeMast;
use App\Models\hrms\EmpQualification;
use App\Models\hrms\EmpDocument;
use Illuminate\Support\Str;
use App\MessageSend;

class TeacherController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->classes = studentClass::get();
         $this->batches = studentBatch::get();
         $this->sections = studentSectionMast::get();
         $this->studentData = studentsMast::get();
        
    }
    public function index()
    {
        $table_title = 'Teachers';
        $teachers = get_teachers();
        return view('admin.teachers.index',compact('teachers','table_title'));

    }

    public function create()
    {
        return view('admin.teachers.create');
        
    }

    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name'          => 'required|string|max:255|min:3',
            'email'         => 'required|email|max:255|unique:users',
            'mobile_no'     => 'required|min:10|max:11|regex:/^[0-9]+$/',
        ]);

        $password = $request->username;
        $data['user_flag']  = 'T';
        $data['password']   = Hash::make($password);
        $data['username']   = $request->username;

        $user = User::create($data);
        $user->attachRole('2');

        $teacher_data =[
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile_no,
            'emp_type'  => 'T',
            'user_id'   => $user->id,
            'username'  => $request->username

        ];
            
        $employee = EmployeeMast::create($teacher_data);

        $docs = [
            'doc_name'   => null,
            'doc_desc'   => null,
            'emp_id'     => $employee->id,
            'doc_file'   => null,
        ];
      
        EmpDocument::create($docs);


        $qual = [
            'qual_name'      => null,
            'percent'        => null,
            'grade'          => null,
            'year_of_passing'=> null,
            'qual_desc'      => null,
            'emp_id'         => $employee->id,
            'qual_doc'       => null,
        ];
       
        EmpQualification::create($qual);

        $sendMessage = [
            'mobile'    => (int)$request->mobile_no,
            'message'   => 'Welcome to '.SCHOOLNAME.' your username is '.$request->username.' and password is '.$password,
        ];
        MessageSend::sendMessage($sendMessage);

       return redirect()->route('teachers.index')->with("success","Teacher created Successfully");

    }

    public function show($id)
    {

         $teacher = EmployeeMast::where('emp_type','T')->orderBy('name')->get();
        return view('admin.teachers.show',compact('teacher'));
    }


    public function edit($id)
    {
        $teacher = EmployeeMast::find($id);
        return view('admin.teachers.edit',compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        
        $data = $request->validate([
            'name'          => 'required|string|max:255|min:3',
            'email'         => 'required|email|max:255',
            'mobile_no'     => 'required|min:10|max:11|regex:/^[0-9]+$/',
        ]);

        $employee = EmployeeMast::find($id);
        $username =  $employee->username;
        // return $employee;

        $password = $request->username;
        $data['password']   = Hash::make($password);
        $data['username']   = $request->username;

        $user = User::find($employee->user_id)->update($data);


        $teacher_data =[
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile_no,            
            'username'  => $request->username
        ];
            
        $employee->update($teacher_data);

        if($request->username != $username ){
            $sendMessage = [
                'mobile'    => (int)$request->mobile_no,
                'message'   => 'Welcome to '.SCHOOLNAME.' your username is '.$request->username.' and password is '.$password.' LISADMIN update your username and password',
            ];
          return  MessageSend::sendMessage($sendMessage);
        }
       return redirect()->route('teachers.index')->with("success","Teacher updated Successfully");
    }

   
    public function destroy($id)
    {
        User::where('id',$id)->update(['deleted_at'=>date('Y-m-d H:i:s'),'status'=>'0']);
        Teacher::where('id',$id)->update(['deleted_at'=>date('Y-m-d H:i:s'),'status'=>'0']);

        return redirect()->back()->with('success','Teacher deleted successfully');
    }

    public function subjectAndTeacher(Request $request){

        $classes  = $this->classes;
        $subject  = Subject::get();
        $teachers = get_teachers();

        return view('admin.teachers.assign-subject.index',compact('teachers','subject','classes'));
    } 
    public function subjectAssignToTeacher(Request $request){
     
        $data = $request->validate([
                'batch_id'       => 'required',
                'class_id'       => 'required',
                'section_id'     => 'required',
                'teacher_id'     => 'required',
                'medium'        =>  'required'
        ]);
        $data['user_id']  = Auth::user()->id;
        $lastId = AssignSubjectToTeacher::create($data);
        $count = count($request->all_subject_id);
                
        for($i= 0 ; $i < count($request->all_subject_id); $i++) {
            $data2 = [
                'assign_subject_teacher_id'   => $lastId->id,
                'assign_subject_id'   => $request->all_subject_id[$i]
            ];
            AssignSubIdToTeacher::create($data2);

        }        
        return "success";        
    }

    public function getSubAssToTeacher(Request $request){
    // return $request->all();
        $data1 = AssignSubjectToTeacher::with('get_assign_subject')
                        ->where('class_id',$request->class_id)
                        ->where('batch_id',$request->batch_id)
                        ->where('section_id',$request->section_id)
                        ->where('medium',$request->medium)
                        ->where('teacher_id',$request->teacher_id)
                        ->get();

                     // return $data1;   
            $get_assign_subject = [];            
            foreach ($data1 as $value) {
                // $get_assign_subject[] = $value->assign_subject_id ;
                foreach ($value['get_assign_subject'] as $value1) {
                    $get_assign_subject[] = $value1->assign_subject_id ;
                }
            }
        $data = Subject::whereIn('id',$get_assign_subject)->get();               
        return response()->json($data);
    } 
}
