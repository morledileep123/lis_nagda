<?php 
use App\Models\master\studentBatch;
use App\Models\hrms\EmployeeMast;

use App\Models\AcademicCalendar;

use App\Models\fees\FeesMast;
use App\Models\fees\FeesHeadMast;
use App\Models\fees\StudentFeeHead;
use App\Models\fees\StudentFeeInstalment;
use App\Models\fees\StudentFeesMast;
use App\Models\fees\ConcessionApplyTrans;
use App\Models\master\Discounts;
use App\Models\transport\BusFeeStructure;

const SCHOOLNAME = 'Lakshya International School';
const SCHOOL_ADDRESS = 'Khachrod Jaora Road Junction, Nagda Junction (M.P.)';
const SCHOOL_PHONE = '+91:-78798-22222';
const SCHOOL_EMAIL = 'hr@lisnagda.org';
const SCHOOL_WEBSITE = 'www.lisnagda.org';
const SCHOOL_CODE = 'www.lisnagda.org';
const SENDTO = [
	'A' => 'Send to All',
	'S'	=> 'Send to Student',
	'T' => 'Send to Teacher'
];

const GENDER = [
    'M' => 'Male',
    'F' => 'Female',
    'O' => 'Other'
];
const MEDIUM = [
    'EM' => 'English Medium',
    'HM' => 'Hindi Medium'
];

const BLOODGROUP = [
	'1'	=> 'A+',
	'2'	=> 'A-',
	'3'	=> 'B+',
	'4'	=> 'B-',
	'5'	=> 'O+',
	'6'	=> 'O-',
	'7'	=> 'AB+',
	'8'	=> 'AB-'
];

const RELIGION = [
	'1' => 'Hindu',
	'2' => 'Muslim',
	'3' => 'Sikh',
	'4' => 'Christian',
	'5' => 'Buddhist',
	'6' => 'Jain',
	'7' => 'Zoroastrianism',
	'8' => 'Other'
];

const GUARDIAN_RELATION = [
	'1' => 'Father',
	'2' => 'Mother',
	'3' => 'Guardian',
	'4' => 'Other',
];
const WORK_STATUS = [
	'1' => 'Self Employed',
	'2' => 'Job',
	'3' => 'Retired'
];
const EMPLOYMENT_TYPE = [
	'1' => 'Government',
	'2' => 'Private'
];

const CASTCATEGORY = [
    1 => 'OBC',
    2 => 'GENERAL',
    3 => 'SC',
    4 => 'ST',
    5 => 'EWS',
    6 => 'SBC',
    7 => 'VJ-A',
    8 => 'NT-B',
    9 => 'NT-C',
    10 => 'NT-D',
    11 => 'Other'
];
const STATUS = [
    'A' => 'Active',
    'P' => 'Pending',
    'S' => 'Suspend'
];

const STUDENTSTATUS = [
	'R' => 'Running',
	'P' => 'Pass',
	'F' => 'Fail' 
];

const FINE_TYPES = [
	1 => 'Fixed',
	2 => 'Per Day'
];

const FINE = [
	1 => 'Amount',
	2 => 'Percentage'
];


const HEAD_TYPES = [
	1 => 'Permanent',
	2 => 'Temporary'
];
	
const CURRENCY = [
	'I' => 'INR',
	'U' => 'USD'
];

const RECIEPT_HEADER_NAME = [
	1 => 'Lakshya International School, Nagda'
];
const COURSE_SELECTION = [
	1 => 'Single Course',
	2 => 'Multiple Courses'
];
const INCLUDE_RTE = [
	0 => 'RTE',
	1 => 'Without RTE'
];
const PAYMENTMODE = [
	1 => 'Cash',
	2 => 'Demand Draft',
	3 => 'Cheque',
	4 => 'Online Payment',
	5 => 'Cash & Cheque',
	6 => 'Cash & Demand Draft',
	7 => 'POS Transcation',
	8 => 'NEFT/Bank Transfered',
	9 => 'IPOS',
	// 10 => 'e-Challan'
];


const INSTALMENT_MODE = [
	1  => 'One Time',
	2  => '2 Instalments',
	3  => '3 Instalments'
	// 4  => '4 Instalments',
	// 5  => '5 Instalments',
	// 6  => '6 Instalments',
	// 7  => '7 Instalments',
	// 8  => '8 Instalments',
	// 9  => '9 Instalments',
	// 10 => '10 Instalments',
	// 11 => '11 Instalments',
	// 12 => '12 Instalments',
];

//For Certificate types created by kishan
const CERTIFICATE = [
  '1' => 'Transfer Certificate',
  '2' => 'School Leaving Certificate',
  '3' => 'Other' 
];
//For Employees types created by kishan

const EMP_TYPE = [
  'T' => 'Teacher',
  'H' => 'HR',
  'A' => 'Accountant',
  'E' => 'Staff Member' 
];
//For QUALIFICATION_NAMES  created by kishan

const QUALIFICATION_NAMES = [
  '1' => 'Diploma',
  '2' => 'Under Graduate',
  '3' => 'Master', 
  '4' => 'PHD' 
];
const ConcessionDiscount = [
  '1' => 'Flat Rate',
  '2' => 'In Percent'
];


//Function Start

if(!function_exists('batches')){
	function batches(){
		return studentBatch::select('id','batch_name')->orderBy('batch_name','desc')->get();
	}
}

if (!function_exists('student_name')) {
    function student_name($student){
        
     return $student->f_name.($student->m_name !=null ? ' '.$student->m_name : '' )." ". $student->l_name;
     
    }
}

if (!function_exists('student_first_guardian')) {
    function student_first_guardian($student){
        
      if($student->studentsGuardiantMast !=null){
          $relation = (Arr::get(GUARDIAN_RELATION,$student->studentsGuardiantMast[0]['relation_id'])) .' Name : ';
          if (isset($student->studentsGuardiantMast[1])) {
            
            $relation1 = (Arr::get(GUARDIAN_RELATION,$student->studentsGuardiantMast[1]['relation_id'])) .' Name : ';
          }else{
            $relation1 = '';
          }
          $name = $student->studentsGuardiantMast[0]['g_name'];

          $name1 = isset($student->studentsGuardiantMast[1]) ? $student->studentsGuardiantMast[1]['g_name'] : '' ;
          // dd($name1);

      }else{
          $relation = 'Father/Guardian';
          $name = 'Johan Doe';
          $name1 = '';
          $relation1='';
      }


      return [
        'relation' => $relation,
        'relation1' => $relation1,
        'name' => $name,
        'name1' => $name1,

      ];     
    }
}

if (!function_exists('file_upload')) {
    function file_upload($file,$folder,$field_name =null,$data = []){
        if(!empty($data) !=0){
            if($data->$field_name != null){
               Storage::delete('public/'.$data->$field_name);
            }
        }

        $name =  time().'_'.$file->getClientOriginalName();
        $file->storeAs('public/'.date('Y').'/'.date('M').'/'.$folder, $name);
        $path = date('Y').'/'.date('M').'/'.$folder.'/'.$name;
        return $path;
    }
}

if(!function_exists('file_name')){
    function file_name($docs){
        $file = explode('/', $docs);
        $doc = explode('_', $file[3]);
        return $doc[1];
    }
}

if(!function_exists('get_teachers')){
    function get_teachers(){
        return EmployeeMast::where('emp_type','T')->orderBy('name')->get();
    }
}

if(!function_exists('multiple_courses_get')){
    function multiple_courses_get($multiple_courses){

    	foreach ($multiple_courses as $value) {
	        $multiple_course =  explode('-', $value);
	        $std_class_id[] = $multiple_course[0];
	        $batch_id[] = $multiple_course[1];
	        $section_id[] = $multiple_course[2];
	        $medium[] = $multiple_course[3];
	    }
	    return [
	    	'std_class_id' 	 => $std_class_id,
	    	'batch_id'	 	 => $batch_id,
	    	'section_id'	 => $section_id,
	    	'medium'		 => $medium
	    ];

        return EmployeeMast::where('emp_type','T')->orderBy('name')->get();
    }
}

if(!function_exists('academic_dates')){
    function academic_dates($month,$year,$weekendDays = ['Sunday']){
         $calendarData = AcademicCalendar::whereYear('date_from',$year)
                        ->whereMonth('date_from',$month)
                        ->whereYear('date_upto',$year)
                        ->whereMonth('date_upto',$month)
                        ->where('user_id', Auth::user()->id)
                        ->get();

        $academic_dates = array();
        foreach ($calendarData as $key => $value) {
           for($date = $value->date_from->copy() ; $date->lte($value->date_upto); $date->addDay()){
                if(!in_array($date->dayName, $weekendDays)){
                    $symbol = 'H';
                    if($value->is_exam == '1'){
                        $symbol = 'E';
                    }
                    $academic_dates[$date->format('Y-m-d')]= $symbol;
                }
           }
        }
        return $academic_dates;
    }
}

if(!function_exists('month_dates')){
    function month_dates($monthStart,$monthEnd,$weekendDays = ['Sunday']){
        $monthDates = array();
          for($date =$monthStart; $date->lte($monthEnd) ; $date->addDay() ){
            $weekend = 0;
            if(in_array($date->dayName, $weekendDays)){
                $weekend = 1;
            }
            $monthDates[$date->format('Y-m-d')] = [
                'day' =>  intval($date->format('d')),
                'weekend' => $weekend
            ];
        }   
        return $monthDates;
    }
}

if(!function_exists('displaywords')){
     function displaywords($number){
         $no = (int)floor($number);
         $point = (int)round(($number - $no) * 100);
         $hundred = null;
         $digits_1 = strlen($no);
         $i = 0;
         $str = array();
         $words = array('0' => '', '1' => 'one', '2' => 'two',
          '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
          '7' => 'seven', '8' => 'eight', '9' => 'nine',
          '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
          '13' => 'thirteen', '14' => 'fourteen',
          '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
          '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
          '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
          '60' => 'sixty', '70' => 'seventy',
          '80' => 'eighty', '90' => 'ninety');
         $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
         while ($i < $digits_1) {
           $divider = ($i == 2) ? 10 : 100;
           $number = floor($no % $divider);
           $no = floor($no / $divider);
           $i += ($divider == 10) ? 1 : 2;


           if ($number) {
              $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
              $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
              $str [] = ($number < 21) ? $words[$number] .
                  " " . $digits[$counter] . $plural . " " . $hundred
                  :
                  $words[floor($number / 10) * 10]
                  . " " . $words[$number % 10] . " "
                  . $digits[$counter] . $plural . " " . $hundred;
           } else $str[] = null;
        }
        $str = array_reverse($str);
        $result = implode('', $str);


        if ($point > 20) {
          $points = ($point) ?
            "" . $words[floor($point / 10) * 10] . " " . 
                $words[$point = $point % 10] : ''; 
        } else {
            $points = $words[$point];
        }
        if($points != ''){        
            echo $result . "Rupees  " . $points . " Paise Only";
        } else {

            echo $result . "Rupees Only";
        }

      }
}

if(!function_exists('student_fee_assign')){
  function student_fee_assign($student){
    // return $student;
     $fees  = FeesMast::with(['fees_heads','fees_instalments'])->where(['std_class_id' => $student->std_class_id,'batch_id' => $student->batch_id,'section_id' => $student->section_id, 'medium' => $student->medium])->first();

      if(!empty($fees)){ 

          $fees_head_ids = collect($fees->fees_heads)->pluck('fees_head_id');
          $status = 'P';

          $is_fee_discount        = $fees->is_fee_discount;
          $installable_amnt       = $fees->installable_amnt;
          $non_installable_amnt   = $fees->non_installable_amnt;
          $online_discount        = $fees->online_discount;
          $fees_amnt              = $fees->fees_amnt;
          $no_of_instalment       = $fees->no_of_instalment;
          $batch_name             = studentBatch::find($fees->batch_id)->batch_name;

          // return $fees;
          if($fees->is_fees_student_assign == '1'){
      
              $dob  = $student->dob;
              $gender  = $student->gender;
              $no  = '';
                        
              //concession fetch
              if($is_fee_discount == '1'){
                  $concession_applies  = ConcessionApplyTrans::where(['class_id'=>$student->std_class_id,'batch_id'=>$student->batch_id])->whereIn('fees_head_id',$fees_head_ids)->whereHas('concession_students',function($q)use($student){
                  $q->where('s_id',$student->id);
                  })->with('concession_students')->get();

                  $concession_amnt = 0;
                  $concession_detl = [];
                  foreach ($concession_applies as $concession_apply) {                          
                      foreach ($concession_apply->concession_students as $concession_student) {
                          $concession_amnt = $concession_student->concession_amnt + $concession_amnt;
                      }

                      $concession_detl[] = [
                          'fees_head_id' => $concession_apply->fees_head_id,
                          'concession_amnt' => $concession_amnt,
                      ];
                  }
              }else{
                  $concession_amnt = 0;
                  $concession_detl = [];
              }

              // return $concession_amnt;

              //START discount variables
                  $discount_mode = null;
                  $discount_amnt = null; 
                  $discount_code = null;
              //END

              $bus_fee_str = [];
              $student_fee_inst = [];
              $student_fee_head = [];

              $student_fee = [
                  'fees_id'               => $fees->fees_id,
                  // 'fees_id'               => '1',
                  's_id'                  => $student->id,
                  'fees_amnt'             => $fees_amnt,
                  'status'                => $status,
                  'online_discount'       => $online_discount,
                  'installable_amnt'      => $installable_amnt,
                  'non_installable_amnt'  => $non_installable_amnt,
                  'fine_amnt'             => 0,
                  'date'                  => date('Y-m-d'),
                  'hostel_amnt'           => 0,
                  'concession_amnt'       => $concession_amnt
                  
              ];
              // return $student_fee;

              // $sibling_dicount  = 0;

              //Sibling Dicount Fetch     
              //When student in teacher so we cant't find student siblings details
              if($is_fee_discount == '1'){
                  if($student->staff_ward != '1'){              
                      if(count($student->siblings) !='0'){
                          $dates[] = $dob;  
                          foreach ($student->siblings as $std_sib) {
                              // $dates[] = $std_sib->sibling_detail->dob;
                            $dates[] = date('Y-m-d');
                          }
                
                          foreach ($dates as $date) {
                              $a[] = strtotime($date);
                          }
                         
                          asort($a);

                          foreach ($a as $value) {
                              $b[] = date('Y-m-d',$value);
                          }
                          foreach ($b as $key => $value) {
                              if($value == $dob){
                                  $no = $key+1;
                              }
                          }
                          $no = $no == '1' ? '2' : $no;

                          $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => $no,'gender' => $gender,'discount_type_id' => '1','batch_id' => session('current_batch'),'status' => 'A'])->first();

                          if(!empty($discount)){
                              $discount_code =  $discount->discount_code;
                              $discount_amnt =  $discount->discount_amnt;
                              $discount_mode =  $discount->discount_mode;    
                          }
                             
                                                    
                      }

                  }else{    

                      $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => '1','discount_type_id' => '2','batch_id' => session('current_batch'),'status' => 'A'])->first();

                       if(!empty($discount)){
                            $discount_code =  $discount->discount_code;
                            $discount_amnt =  $discount->discount_amnt;
                            $discount_mode =  $discount->discount_mode;    
                        }
                  }

              
                  if($discount_mode !=null){
                      if($discount_mode ='P'){                                  
                         $discount_amnt = $student_fee['discount_amnt'] = ((int)$installable_amnt * $discount->discount_amnt) / 100;
                      }else{
                          $discount_amnt = $student_fee['discount_amnt'] = $discount->discount_amnt;
                      }
                      $student_fee['discount_mode'] = $discount->discount_mode;
                      $student_fee['discount_code'] = $discount->discount_code;
                  }
              }


              if($student->bus_fee_id !=null){
                  $bus_fee_str = BusFeeStructure::find($student->bus_fee_id);
                  $student_fee['bus_amnt'] = $bus_fee_str->bus_fee_amount;

              }else{
                  $student_fee['bus_amnt'] =0;
              }


              $bus_amnt = !empty($bus_fee_str)  !=0 ? (float)$bus_fee_str->bus_fee_amount : 0;

              $hostel_amnt = 0;

              $total_amnt = ((int)$fees_amnt + (float)$bus_amnt - (float)$discount_amnt) - (float)$concession_amnt; 
              

              $student_fee['total_amnt']  = $total_amnt;
              $student_fee['due_amnt']    = $total_amnt;
              $student_fee['batch_id']    = $fees->batch_id;  

              // return $student_fee; 
              $std_fees_mast =  StudentFeesMast::create($student_fee);

              $instalment_amnt = ((float)$installable_amnt / (int)$no_of_instalment);
              $inst_bus_amnt  = (float)$bus_amnt / (int)$no_of_instalment; 
              $inst_hostel_amnt = (float)$hostel_amnt / (int)$no_of_instalment; 
              $inst_discount_amnt = $discount_amnt !=0 ? ((float)$discount_amnt / $no_of_instalment) : 0;
              $inst_concession_amnt = $concession_amnt !=0 ? ((float)$concession_amnt / $no_of_instalment) : 0;


              //return $inst_concession_amnt;

              foreach ($fees->fees_instalments as $m => $fees_instalment) {
                  $inst_amnt = $fees_instalment->instalment_amnt; 

                  $inst_title = str_replace(' ','_',$fees->fees_name).'_('.(Arr::get(MEDIUM,$fees->medium)).')_'.$batch_name.'_inst_'.date('M',strtotime($fees_instalment->start_dt)).'-'.date('M',strtotime($fees_instalment->end_dt));


                  $inst_total_amnt = (float)$inst_amnt + (float)$inst_bus_amnt - (float)$inst_discount_amnt - (float)$inst_concession_amnt;

                  $student_fee_inst = [
                      's_id'                  => $student->id,
                      'inst_title'            => $inst_title,
                      // 'std_fees_mast_id'      => '1',
                      'std_fees_mast_id'      => $std_fees_mast->std_fees_mast_id,
                      'inst_amnt'             => $inst_amnt,
                      'inst_concession_amnt'  => $inst_concession_amnt, 
                      'inst_discount_amnt'    => $inst_discount_amnt,
                      'inst_due_date'         => $fees_instalment->end_dt,
                      'inst_status'           => $status,
                      'inst_bus_amnt'         => $inst_bus_amnt,
                      'inst_total_amnt'       => $inst_total_amnt,
                      'inst_due_amnt'         => $inst_total_amnt,
                      'inst_hostel_amnt'      => $inst_hostel_amnt,
                  ];

                  $std_fee_inst  = StudentFeeInstalment::create($student_fee_inst);

                  foreach ($fees->fees_heads as $fee_head) {
                      $fee_head_dtl = FeesHeadMast::find($fee_head->fees_head_id);
                      // return $fee_head_dtl;
                      $fee_head_concession_amnt = count($concession_detl) !=0 ? (!empty(collect($concession_detl)->where('fees_head_id',$fee_head->fees_head_id)->first()) ? collect($concession_detl)->where('fees_head_id',$fee_head->fees_head_id)->first()['concession_amnt'] : 0)  : 0;
                      
                      if($fee_head_dtl->is_installable == '1'){
                          $fee_head_amnt = (float)$fee_head->head_amnt / (int)$no_of_instalment;
                          $fee_head_discount = $inst_discount_amnt;
                          $fee_head_concession_amnt = (float)$fee_head_concession_amnt / (int)$no_of_instalment;
                      }else{
                          $fee_head_amnt = $fee_head->head_amnt;
                          $fee_head_discount = 0;
                          $fee_head_concession_amnt = $fee_head_concession_amnt;
                      }

                      $fee_head_total_amnt = (float)$fee_head_amnt - (float)$fee_head_discount - (float)$fee_head_concession_amnt;

                      // return $fee_head_amnt;                    


                      // return $fee_head_concession_amnt;
                         

                      if($m == 0){                                        
                          $student_fee_head = [
                              'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                              // 'std_fee_inst_id'         => '1',
                              's_id'                    => $student->id,
                              'fee_head_amnt'           => $fee_head_amnt,
                              'fee_head_name'           => $fee_head_dtl->head_name,   
                              'fees_head_id'            => $fee_head_dtl->fees_head_id,   
                              'fee_head_concession_amnt'=> $fee_head_concession_amnt,
                              'fee_head_total_amnt'     => $fee_head_total_amnt,
                              'fee_head_due_amnt'       => $fee_head_total_amnt,  
                              'fee_head_discount'       => $fee_head_discount,  

                          ];
                          StudentFeeHead::create($student_fee_head);
                      }
                      else{
                          if($fee_head_dtl->is_installable == '1'){
                              $student_fee_head = [
                                  'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                                  // 'std_fee_inst_id'         => '1',
                                  's_id'                    => $student->id,
                                  'fee_head_amnt'           => $fee_head_amnt,
                                  'fee_head_name'           => $fee_head_dtl->head_name,   
                                  'fees_head_id'            => $fee_head_dtl->fees_head_id, 
                                  'fee_head_concession_amnt'=> $fee_head_concession_amnt,
                                  'fee_head_total_amnt'     => $fee_head_total_amnt,
                                  'fee_head_due_amnt'       => $fee_head_total_amnt,  
                                  'fee_head_discount'       => $fee_head_discount,  

                              ];
                              StudentFeeHead::create($student_fee_head);
                          }
                      }

                  }

                   if(!empty($bus_fee_str) !=0){
                       $student_fee_head = [
                          'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                          's_id'                    => $student->id,
                          'fee_head_amnt'           => $inst_bus_amnt,
                          'fee_head_name'           => 'Bus Fees',   
                          'fee_head_concession_amnt'=> 0,
                          'fee_head_total_amnt'     => $inst_bus_amnt,
                          'fee_head_due_amnt'       => $inst_bus_amnt,  
                          'fee_head_discount'       => 0,  
                      ];
                      StudentFeeHead::create($student_fee_head);
                  }
              }
              
          }
      }

  }
}

// if(!function_exists('total_students')){
//   function total_students(){
//     return studentMast::where('batch_id',session('current_batch'))->count();
//   }
// }

//For careerApplyPost  created by kishan
const  careerApplyPost = [
  'PGT English Teacher' => 'PGT English Teacher',
  'PGT Social Science Teacher' => 'PGT Social Science Teacher',
  'Accounts Teacher' => 'Accounts Teacher', 
  'Computer Teacher' => 'Computer Teacher' 
];