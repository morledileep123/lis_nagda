<?php

namespace App\Http\Controllers\Admin\composeSmsAndEmail;

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
use App\Models\composeEmail\ComposeSmsStaffId;
use App\Models\composeEmail\ComposeSmsStudentId;
use App\Models\composeEmail\ComposeSmsStaffIdAndStudentId;
use App\Models\composeEmail\ComposeEmail;
use App\Models\composeEmail\ComposeSms;


use App\Models\compose\ComposeSmsEmailMast;
use App\Models\compose\ComposeSmsEmail;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComposeMail;
use App\Models\sendmessage\SendMessage;

class EmailAndSMSController extends Controller
{

// code start for compose email..................................

    public function emailCompose(){
    	  $classes = studentClass::get();
        $batches = studentBatch::get();


        
        $sections = studentSectionMast::get();
        $teacher = get_teachers();
        return view('admin.composeSmsAndEmail.email.index',compact('classes','sections','batches','teacher'));

    }

    public function getStudentsForEmailCompose(Request $request){

    	// $userRole = Auth::user()->roles;
    	if ($request->type =='student') {
    	
    	   $getData = studentsMast::where('batch_id',$request->batch_id)
                        ->where('std_class_id',$request->std_class_id)
                        ->where('section_id',$request->section_id)
                        ->where('user_id',Auth::user()->id)
                        ->get();
                        // dd( $getData);
       	$type ='student';
        $composeType = 'E';
         return view('admin.composeSmsAndEmail.student-table',compact('getData','type','composeType'));                       

    	}elseif($request->type =='faculty'){
    		$getData = get_teachers();
    		$type ='faculty';
            $composeType = 'E';

         return view('admin.composeSmsAndEmail.staff-table',compact('getData','type','composeType'));                       
    	}
    }

    public function sendEmail(Request $request){
   		// dd($request);

   		if($request->attechment !=null){

            $data['attechment'] =  file_upload($request->attechment,'EmailCompose');

            }else{
                $data['attechment'] = 'null';
            }
 
            $data['user_id']  = Auth::user()->id;
            $data['clas_batch_section'] =json_encode($request->clas_batch_section,true);
            $data['compose_mail_content'] = $request->compose_mail_content;


       if ($request->sendtype =='A') {

            $composeSmsEmail = [
                    'user_id' => Auth::user()->id,
                   'send_to'  => $request->sendtype,
                   'body' => $data['compose_mail_content'],
                   'subject'  => $request->subject,
                   'attachment'  => $data['attechment'],
                   'compose_type' => 'E',
                   ];
            $composeLastId = ComposeSmsEmailMast::create( $composeSmsEmail)->id;     
            $getAll = User::get();

             foreach ($getAll as $key => $getAlls) {
                if (!empty($getAlls->user_flag)) {
                     $data = [
                        'compose_sms_id'=>$composeLastId,
                        'receiver_id' =>$getAlls->id
                   ];
                    $getStudents = ComposeSmsEmail::create($data)->compose_sms_id;
                 // Send sms...........................................
                    // $getComposeEmail = ComposeSmsEmail::where('compose_sms_id',$getStudents)
                    //                     ->where('receiver_id',$getAlls->id)
                    //                     ->first();
                    // $studentIds = $getComposeEmail->receiver_id;

                    // $studentsMast = user::where('parent_id',$studentIds)->first();

                    // $email = $studentsMast->email;
                    // $content = File::get('storage/'.$data['attechment']);
                    // $applicantData = ([
                    //     'data' => $data,
                    //     'file' => $content,
                    //     'exe' => $extension,
                    // ]);
                    // Mail::to($email)->send(new ComposeMail($applicantData));
                }
            }

       }else if ($request->sendtype == 'S') {
        
                $composeSmsEmail = [
                           'user_id' => Auth::user()->id,
                           'send_to'  => $request->sendtype,
                           'body' => $data['compose_mail_content'],
                           'subject'  => $request->subject,
                           'attachment'  => $data['attechment'],
                           'compose_type' => 'E',
                           'course_batches' => $data['clas_batch_section'],
                           ];
                $composeLastId = ComposeSmsEmailMast::create( $composeSmsEmail)->id;         
           $count1 = count($request->reciver_id);
           // dd( $count1);
            if($count1 != 0){
                $y = 0;
                while($y < $count1){
                    if($request->reciver_id[$y] !=''){
                        $data3 = array(
                          'compose_sms_id'=>$composeLastId,
                          'receiver_id' =>$request->reciver_id[$y]
                           
                        );

                        $getStudentsId = ComposeSmsEmail::create($data3)->compose_sms_id;
                        // satrt code for send mail..........................
                        // $getComposeEmail = ComposeSmsEmail::where('compose_sms_id',$getStudentsId)
                        //                 ->where('receiver_id',$request->reciver_id)
                        //                 ->first();
                        // $studentIds = $getComposeEmail->receiver_id;

                        // $studentsMast = studentsMast::where('id',$studentIds)->first();
                        // $email = $studentsMast->email;
                        // $content = File::get('storage/'.$data['attechment']);
                        // $applicantData = ([
                        //     'data' => $data,
                        //     'file' => $content,
                        //     'exe' => $extension,
                        // ]);
                        // Mail::to($email)->send(new ComposeMail($applicantData));
                        // fend dode for send mail...........................
                        
                    }             
                    $y++; 
                }
            } 
       }else if ($request->sendtype == 'T') {

           $composeSmsEmail = [
                       'user_id' => Auth::user()->id,
                       'send_to'  => $request->sendtype,
                       'body' => $data['compose_mail_content'],
                       'subject'  => $request->subject,
                       'attachment'  => $data['attechment'],
                       'compose_type' => 'E',
                       ];
            $composeLastId = ComposeSmsEmailMast::create( $composeSmsEmail)->id;
            $count1 = count($request->reciver_id);
            if($count1 != 0){
                $y = 0;
                while($y < $count1){
                    if($request->reciver_id[$y] !=''){
                        $data3 = array(
                            'compose_sms_id'=>$composeLastId,
                            'receiver_id' =>$request->reciver_id[$y]
                        );
                        $getStaffs = ComposeSmsEmail::create($data3)->compose_sms_id;
                        //send email......................
                        // $getComposeEmail = ComposeSmsEmail::where('compose_sms_id',$getStaffs)
                        //                 ->where('receiver_id',$request->reciver_id)
                        //                 ->first();
                        // $studentIds = $getComposeEmail->receiver_id;

                        // $studentsMast = user::where('parent_id',$studentIds)->first();
                        // $email = $studentsMast->email;
                        // $content = File::get('storage/'.$data['attechment']);
                        // $applicantData = ([
                        //     'data' => $data,
                        //     'file' => $content,
                        //     'exe' => $extension,
                        // ]);
                        // Mail::to($email)->send(new ComposeMail($applicantData));
                    }             
                    $y++; 
                }
            }
        } 
      return "success";

    }
// end code for compose mail..................................

// code start for compose SMS..................................
   public function  smsCompose(){

         $classes = studentClass::get();
         $batches = studentBatch::get();
         $sections = studentSectionMast::get();
         $teacher = get_teachers();
        return view('admin.composeSmsAndEmail.sms.index',compact('classes','sections','batches','teacher'));
    }   
    public function getStudentsForSmsCompose(Request $request){
        if ($request->type =='student') {
        
            $getData = studentsMast::with('user_data')->where('batch_id',$request->batch_id)
                    ->where('std_class_id',$request->std_class_id)
                    ->where('section_id',$request->section_id)
                    ->get();
            $type ='student';
            // dd( $getData);
            $composeType = 'S';
             return view('admin.composeSmsAndEmail.student-table',compact('getData','type','composeType'));                       

            }else{
                $getData = get_teachers();
                $composeType = 'S';
                $type ='faculty';
             return view('admin.composeSmsAndEmail.staff-table',compact('getData','type','composeType'));                       
            }
    } 
    public function sendSms(Request $request){

        // dd($request);
        // dd($request);
    	$data['user_id']  = Auth::user()->id;
        $data['clas_batch_section'] =json_encode($request->clas_batch_section,true);
        $data['compose_sms_content'] = $request->compose_sms_content;


       if ($request->sendtype =='A') {

            $composeSmsEmail = [
                   'user_id' => Auth::user()->id,
                   'send_to'  => $request->sendtype,
                   'body' => $data['compose_sms_content'],
                   'compose_type' => 'S'
                   ];
            $composeLastId = ComposeSmsEmailMast::create( $composeSmsEmail)->id;     
            $getAll = User::get();

             foreach ($getAll as $key => $getAlls) {
                if (!empty($getAlls->user_flag)) {
                     $data = [
                        'compose_sms_id'=>$composeLastId,
                        'receiver_id' =>$getAlls->id
                   ];
                    $getStudents = ComposeSmsEmail::create($data);

                $getMobile = $getAlls->mobile_no;
                // Send sms...........................................
                // $sendData = [
                //         'message' =>$data['compose_sms_content'],
                //         'mobile' => $getMobile 
                //     ]; 
                //     $sendMessage = SendMessage::sendCode($sendData);
                //     if ($sendMessage) {
                //         $user = User::find($getStaffs->id)->update(['compose_message_sent' => '1']);
                //     }  
                }
            }

       }else if ($request->sendtype == 'S') {
            $composeSmsEmail = [
                       'user_id' => Auth::user()->id,
                       'send_to'  => $request->sendtype,
                       'body' => $data['compose_sms_content'],
                       'compose_type' => 'S',
                       'course_batches' => $data['clas_batch_section'],
                       ];
            $composeLastId = ComposeSmsEmailMast::create( $composeSmsEmail)->id;         
           $count1 = count($request->reciver_id);
            if($count1 != 0){
                $y = 0;
                while($y < $count1){
                    if($request->reciver_id[$y] !=''){
                        $data3 = array(
                          'compose_sms_id'=>$composeLastId,
                          'receiver_id' =>$request->reciver_id[$y]
                           
                        );
                        $getStudents = ComposeSmsEmail::create($data3);
                        
                        //send sms......................
                        // $studentMast = User::where('user_flag','S')->where('id',$request->s_id[$y])->first();
                        // $studentMobile = $studentMast->mobile_no;
                        // $sendData = [
                        //     'message' => $data['compose_sms_content'],
                        //     'mobile' =>  $studentMobile
                        // ]; 
                        // $sendMessage = SendMessage::sendCode($sendData);
                        // if ($sendMessage) {
                        //     $user = User::where('id',$getStudents->s_id )->update(['compose_message_sent' => '1']);
                        // }
                    }             
                    $y++; 
                }
            } 
       }else if ($request->sendtype == 'T') {

           $composeSmsEmail = [
                       'user_id' => Auth::user()->id,
                       'send_to'  => $request->sendtype,
                       'body' => $data['compose_sms_content'],
                       'compose_type' => 'S',
                       ];
            $composeLastId = ComposeSmsEmailMast::create( $composeSmsEmail)->id;
            $count1 = count($request->reciver_id);
            if($count1 != 0){
                $y = 0;
                while($y < $count1){
                    if($request->reciver_id[$y] !=''){
                        $data3 = array(
                            'compose_sms_id'=>$composeLastId,
                            'receiver_id' =>$request->reciver_id[$y]
                        );
                        // dd($data3);
                        $getStaffs = ComposeSmsEmail::create($data3);
                        //send sms......................

                        // $teacherMast = User::where('user_flag','T')->where('id',$request->faculty_id[$y])->first();
                        // $teacherMobile = $teacherMast->mobile_no;
                        // $sendData = [
                        //     'message' => $data['compose_sms_content'],
                        //     'mobile' =>  $teacherMobile 
                        // ]; 
                        // $sendMessage = SendMessage::sendCode($sendData);
                        // if ($sendMessage) {
                        //     $user = User::where('id',$getStaffs->faculty_id )->update(['compose_message_sent' => '1']);
                        // }
                    }             
                    $y++; 
                }
            } 
       }else{
        return "error";
       }
      
      return "success";
    } 

    public function smsDeliveryReport(){

        $getComposeSms = ComposeSmsEmail::with('get_user')->get();
        $receiverIds = [];
        $compose_sms_id = [];

        foreach ($getComposeSms as $value) {
                $compose_sms_id[]  = $value->compose_sms_id;
            
        }
        $compose = ComposeSmsEmailMast::whereIn('id',$compose_sms_id)->where('compose_type','S')->get();
        foreach ($compose as $composes) {
                $receiverIds[]  = $composes->id;
            
        }
        // dd($getComposeSms);
        
        $composeType = 'S';
        return view('admin.composeSmsAndEmail.sms.delivery-record',compact('getComposeSms','composeType','receiverIds')); 
    }
    public function emailDeliveryReport(){

        $getComposeSms = ComposeSmsEmail::with('get_user')->get();
        $receiverIds = [];
        $compose_sms_id = [];
        foreach ($getComposeSms as $value) {
                $compose_sms_id[]  = $value->compose_sms_id;
            
        }
        $compose = ComposeSmsEmailMast::whereIn('id',$compose_sms_id)->where('compose_type','E')->get();
        foreach ($compose as $composes) {
                $receiverIds[]  = $composes->id;
            
        }
        // dd($receiverIds);

        $composeType = 'S';

        return view('admin.composeSmsAndEmail.email.email-delivery-record',compact('getComposeSms','composeType','receiverIds')); 
    }
    //end code for compose SMS..................................
}
