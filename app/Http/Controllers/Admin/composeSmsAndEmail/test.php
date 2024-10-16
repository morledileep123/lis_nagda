<?php

namespace App\Http\Controllers\Admin\ComposeEmailAndSMS;
use Auth;
use File;
use Validator;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\student\studentsMast;
use App\Models\AssignSubjectGroupStudent;
use App\Models\composeEmail\ComposeEmailStaffId;
use App\Models\composeEmail\ComposeEmailStudentId;
use App\Models\composeEmail\ComposeEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeMail;
// ComposeEmailController

class ComposeEmailAndSMS extends Controller
{
    public function emailCompose(){
    	 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $teacher = get_teachers();
        return view('admin.composeSmsAndEmail.email.index',compact('classes','sections','batches','teacher'));

    }

    public function getStudentsForEmailCompose(Request $request){

    	// $userRole = Auth::user()->roles;
    	// dd($userRole);
    	if ($request->type =='student') {
    	
    	 $getData = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
       	$type ='student';
         return view('admin.composeSmsAndEmail.student-table',compact('getData','type'));                       

    	}else{
    		$getData = get_teachers();
    		$type ='faculty';
         return view('admin.composeSmsAndEmail.staff-table',compact('getData','type'));                       
    	}
    }

    public function sendEmail(Request $request){
   		
   		if($request->attechment !=null){
           //  $verify = $request->validate([
           //      'attechment'  => 'required|mimes:doc,docx,pdf,txt,xlsx,jpeg,png,jpg|max:2048',
           //  ]);
           //  $filename = time().'.'.$request->attechment->getClientOriginalName();
           //  $image = $request->attechment->storeAs('public/emailComposeAttechment_'.Auth::user()->id.'/emailComposeAttechment', $filename);
           // $data['attechment'] = 'emailComposeAttechment_'.Auth::user()->id.'/emailComposeAttechment'.$filename;
	   		$filename        = $request->file('attechment')->getClientOriginalName();
	        $extension       = $request->file('attechment')->getClientOriginalExtension();
	        $fileNameToStore = $filename;          
	        $path            = $request->file('attechment')->store('emailComposeAttechment_'.Auth::user()->id, 'public');

	        $data['attechment']    = $fileNameToStore;
        }else{
            $data['attechment'] = 'null';
        }
        $data['user_id']  = Auth::user()->id;
        $data['batch_id'] = $request->batch_id;
        $data['class_id'] = $request->std_class_id;
        $data['section_id'] = $request->section_id;
        $data['subject']  = $request->subject;
        $data['compose_mail_content'] = $request->compose_mail_content;
        if($request->sendtype == 1){
        	$data['sender_type'] = 'send_to_all';
        }else if($request->sendtype == 2){
        	$data['sender_type'] = 'send_to_students';

        }else if($request->sendtype == 3){
        	$data['sender_type'] = 'send_to_all_faculty';
        }

        $lastId = ComposeEmail::create($data)->id;
          
      if ($request->sendtype == 1) {

	        /*$allUser = User::where('user_flag','T')
	        				->where('user_flag','S')
					        ->get();
			foreach ($allUser as $allUsers) {
				$content = File::get('storage/'.$path);
	            $applicantData = ([
	                'data' => $data,
	                'file' => $content,
	                'exe' => $extension,
	            ]);
	            
	            Mail::to($allUsers->email)->send(new ComposeMail($applicantData));		        	
			}	*/		        
       		

       } else if ($request->sendtype == 2) {
		 $count = count($request->s_id);
	        if($count != 0){
	            $x = 0;
	            while($x < $count){
	                if($request->s_id[$x] !=''){
	                    $data2 = array(
	                        'compose_email_id' => $lastId,
	                        'students_id'      => $request->s_id[$x]
	                    );
	                   
	                   /*$studentsMast = studentsMast::where('id',$data2['students_id'])->first();

	                   $studentsEmail = $studentsMast->email;
	                   $content = File::get('storage/'.$path);
			            $applicantData = ([
			                'data' => $data,
			                'file' => $content,
			                'exe' => $extension,
			            ]);
			            Mail::to($studentsEmail)->send(new ComposeMail($applicantData));*/
	                    ComposeEmailStudentId::create($data2);
	                }             
	                $x++; 
	            }
	        }
        }else if($request->sendtype == 3) {

		 $count1 = count($request->faculty_id);
	        if($count1 != 0){
	            $y = 0;
	            while($y < $count1){
	                if($request->faculty_id[$y] !=''){
	                    $data3 = array(
	                        'compose_email_id'  => $lastId,
	                        'faculty_id'   => $request->faculty_id[$y]
	                    );

	                   /*$teacherMast = User::where('user_flag','T')->where('id',$data3['students_id'])->first();
	                   
	                   $steacherEmail = $teacherMast->email;
	                   $content = File::get('storage/'.$path);
			            $applicantData = ([
			                'data' => $data,
			                'file' => $content,
			                'exe' => $extension,
			            ]);
			            Mail::to($steacherEmail)->send(new ComposeMail($applicantData));*/

	                    ComposeEmailStaffId::create($data3);
	                }             
	                $y++; 
	            }
	        }
        } 
      return "success";
    }


   public function smsCompose(){

    	 $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $teacher = get_teachers();
        return view('admin.composeSmsAndEmail.sms.index',compact('classes','sections','batches','teacher'));
    }   
    public function getStudentsForSmsCompose(Request $request){

    	if ($request->type =='student') {
    	
    	 $getData = studentsMast::where('batch_id',$request->batch_id)
                                ->where('std_class_id',$request->std_class_id)
                                ->where('section_id',$request->section_id)
                                ->where('user_id',Auth::user()->id)
                                ->get();
       	$type ='student';
         return view('admin.composeSmsAndEmail.student-table',compact('getData','type'));                       

    	}else{
    		$getData = get_teachers();
    		$type ='faculty';
         return view('admin.composeSmsAndEmail.staff-table',compact('getData','type'));                       
    	}
    } 
    
}
