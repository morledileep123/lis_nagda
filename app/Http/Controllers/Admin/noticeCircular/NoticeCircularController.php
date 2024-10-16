<?php

namespace App\Http\Controllers\Admin\noticeCircular;

use Auth;
use App\User;
use Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NoticeCircular;
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
use Illuminate\Support\Facades\Hash;
use App\Models\classes\SectionManage;
use App\Models\noticecircular\NoticeClassBatchId;
use App\Models\noticecircular\NoticeStudent;
use App\Models\noticecircular\NoticeFaculty;
use App\Models\hrms\EmployeeMast;

class NoticeCircularController extends Controller
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
        return view('admin.notice-circular.index');
    }

    public function create()
    {
         $classes = $this->classes;
         $batches = $this->batches;
         $sections = $this->sections;
         $studentData = $this->studentData;
         // dd(session('current_batch'));
        return view('admin.notice-circular.create',compact('studentData','classes','sections','batches'));
        
    }

    
    public function store(Request $request)
    {

        $request->validate([
                'sendtype'=>'required',
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required'
            ]);
        // $data['user_id'] = Auth::user()->id;
        $data['circular_title']     = $request->circular_title;
        $data['date_from_display']  = $request->date_from_display;
        $data['date_to_display']    = $request->date_to_display;
        $data['circular_description'] = $request->circular_description;
        $data['selected_student']     = $request->selected_student;
        $data['selected_student']     = json_encode($data['selected_student']);
        
    if($request->sendtype == 1){
        $data['sender']   = 'A';
        
            if($request->file !=null){ 
                $verify = $request->validate([
                'file' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
             $data['file'] =  file_upload($request->file,'NoticeCircularAll');
            }else{
                $data['file'] = !empty($data) ? $request->file : null ;
                
            }
            $data['batch_id'] =$request->batch_id;
            $create_stud = NoticeCircular::create($data)->id;
             
            return "success";

        }elseif($request->sendtype == 2){
                $data['sender']   = 'C';


        if($request->file !=null){ 
            $verify = $request->validate([
                'file' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
            $data['file'] =  file_upload($request->file,'NoticeCircularStudent');
        }else{
            $data['file'] = !empty($data) ? $request->file : null ;
            
        }
        $data['batch_id'] =$request->batch_id;

        $create_stud = NoticeCircular::create($data)->id;
        $batchId = $request->batch_id;
        foreach ($request->course_batches as $key => $value) {
            $datas2 = array(
                        'notice_circular_id'  => $create_stud,
                        'classes_id'   => $value,
                        'batch_id'   => $batchId
                    );
            NoticeClassBatchId::create($datas2);
        }
         return "success";
       
    }elseif($request->sendtype == 3){
        $data['sender']   = 'F';

        if($request->file !=null){ 
            $verify = $request->validate([
                'file' =>'required|image|mimes:jpeg,png,jpg' 
            ]);
            $data['file'] =  file_upload($request->file,'NoticeFaculty');
        }else{
            $data['file'] = !empty($data) ? $request->file : null ;
            
        }
        $data['batch_id'] =$request->batch_id;
        $create_stud = NoticeCircular::create($data)->id;
        $batchId = $request->batch_id;

        foreach ($request->faculty_id as $key => $value) {
            $datas2 = array(
                        'notice_circular_id'  => $create_stud,
                        'batch_id'   => $batchId,
                        'faculty_id'   => $value
                    );
            NoticeFaculty::create($datas2);
        }

        return "success";
        }



    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function getSendAllData(Request $request){

        if( $request->getSendAllData == 'send_to_all'){
            $getAllSendData = NoticeCircular::where('sender','A')->get();
            $page = 'send_to_all';
         return view('admin.notice-circular.manage.sendtoall.index',compact('getAllSendData','page'));
        }
    } 
    public function sentToAllShow($id){

        $getAllSendData = NoticeCircular::where('id',$id)->first();
      
        $page = 'send_to_all';

        return view('admin.notice-circular.manage.sendtoall.show',compact('getAllSendData','page'));
    }
    public function sentToAllEdit($id){

        $getAllSendData = NoticeCircular::where('sender','A')->where('id',$id)->first();
            return view('admin.notice-circular.manage.sendtoall.edit',compact('getAllSendData'));
    } 
    public function sentToAllupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender','A')->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    } 

    public function getSendStudentData(Request $request){

         $studentData = NoticeClassBatchId::where('classes_id',$request->courseId)->get();
        foreach ($studentData as $value1) {
            $idArray1[]   = $value1->notice_circular_id;
       }
        $studentData1 = NoticeCircular::whereIn('id',$idArray1)->get();
         return view('admin.notice-circular.manage.sendtostudent.index',compact('studentData1'));
    } 
    public function sentToStudentShow($id){
        $idArray = [];
        $getAllSendData = NoticeCircular::with('get_circular_id.get_classes')->where('sender','C')->where('id',$id)->first();
        // return $getAllSendData;
        $sId = $getAllSendData->id;
       
        $page = 'send_to_all';

        return view('admin.notice-circular.manage.sendtostudent.show',compact('getAllSendData','page'));
    }
    public function sentToStudentEdit($id){

        $getAllSendData = NoticeCircular::where('sender','C')->where('id',$id)->first();

        return view('admin.notice-circular.manage.sendtostudent.edit',compact('getAllSendData'));
    } 
    public function sentToStudentupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender','C')->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    }

     public function getFacultydata(Request $request){

        // $facultyData = get_teachers();
        $facultyData = EmployeeMast::get();
        $page ='Teachers';
         return view('admin.notice-circular.table',compact('facultyData','page'));
    }

    public function getSendFacultyData(Request $request){

        if( $request->getSendAllData == 'send_to_faculty'){
            $getAllSendData = NoticeCircular::where('sender','F')->get();
            $page = 'send_to_faculty';
         return view('admin.notice-circular.manage.sendtofaculty.index',compact('getAllSendData','page'));
        }
    }

     public function sentToFacultyShow($id){
        $getAllSendData = NoticeCircular::where('sender','F')->where('id',$id)->first();
        $getAllstudents = NoticeFaculty::with('facultyInfo')->where('notice_circular_id',$getAllSendData->id)->get();
        $page = 'send_to_faculty';

        return view('admin.notice-circular.manage.sendtofaculty.show',compact('getAllSendData','page','getAllstudents'));
    }
    public function sentToFacultyEdit($id){
        $getAllSendData = NoticeCircular::where('sender','F')->where('id',$id)->first();

        return view('admin.notice-circular.manage.sendtofaculty.edit',compact('getAllSendData'));
    } 
    public function sentToFacultyupdate(Request $request ,$id){
        $data = $request->validate([
                'circular_title'=>'required',
                'date_from_display'=>'required',
                'date_to_display'=>'required',
                'circular_description'=>'required',
            ]);
        $getAllSendData = NoticeCircular::where('sender','F')->where('id',$id)->update($data);

        return redirect()->back()->with('success','Updated successfully');
     
    }
    public function getAllClasses(){

        $getAllSendData = studentClass::get();
            return response()->json($getAllSendData);
    }
     public function getSendToStudentsData(Request $request){
        if( $request->val == 2){
            $getAllSendData = NoticeCircular::where('sender','C')->get();
            $page = 'send_to_student';
                return view('admin.notice-circular.manage.sendtostudent.index',compact('getAllSendData','page'));
        }
    } 
}
