<?php

namespace App\Http\Controllers\Admin\fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\student\studentsMast;
use Helpers;

use App\Models\fees\FeesMast;
use App\Models\fees\FeesHeadMast;
use App\Models\fees\FeesHeadTrans;
use App\Models\fees\FeesInstalment;
use App\Models\fees\FineType;
use App\Models\fees\StudentFeeHead;
use App\Models\fees\StudentFeeInstalment;
use App\Models\fees\StudentFeeReceipt;
use App\Models\fees\StudentFeeReceiptHead;
use App\Models\fees\StudentFeesMast;
use App\Models\fees\ConcessionApplyTrans;

use App\Models\master\Discounts;
use App\Models\transport\BusFeeStructure;
use Arr;
use Str;
use App\Models\classes\SectionManage;


class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fees = FeesMast::with('batch')->where('batch_id',session('current_batch'))->get();
        // dd( $data);
        return view ('admin.fees.index',compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $classes = studentClass::get();

        $fee_heads = FeesHeadMast::where('status','A')->where('batch_id',session('current_batch'))->orderBy('head_sequence_order')->get();
        // return session('current_session');

        $section_manages =  SectionManage::with(['batch_name','class_name','section_names'])->where('batch_id',session('current_batch'))->get();

        return view ('admin.fees.create',compact('classes','fee_heads','section_manages'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
            // dd($request->all());
            // $tution_fee = '0';
            $is_fee_discount  = isset($request->is_fee_discount) ? $request->is_fee_discount : '0'; 

            $installable_amnt       = $request->installable_amnt;
            $non_installable_amnt   = $request->non_installable_amnt;
            $no_of_instalment = $request->no_of_instalment;

            $request->validate([
                'fees_name'     => 'required',
                'fees_amnt'      => 'required|not_in:0'             

            ]);

            if($request->courseselection == '1'){
                $request->validate([
                    'std_class_id'  => 'required|not_in:all',
                    'batch_id'      => 'required|not_in:""',             
                    'section_id'    => 'required|not_in:""',             
                    'medium'        => 'required|not_in:""',
                    'feesfor'       => 'required|not_in:"0"',

                ]);
            }else{
                $request->validate([
                    'multiple_courses'=> 'required|not_in:all',                   
                ]);
            }

            $fees_mast = [
                'fees_name'             => $request->fees_name,
                'fees_amnt'             => $request->fees_amnt,
                'receipt_head_id'       => $request->receipt_head_id,
                'currency_code'         => $request->currency_code,
                'no_of_instalment'      => $request->no_of_instalment,
                'courseselection'       => $request->courseselection,
                'online_discount'       => $request->online_discount,
                'is_fees_student_assign'=> isset($request->is_fees_student_assign) ? $request->is_fees_student_assign : '0',
                'is_fee_discount'=> $is_fee_discount,

                'std_class_id'          => $request->courseselection == '1' ? $request->std_class_id : null,
                'batch_id'              => $request->courseselection == '1' ? $request->batch_id : null,
                'section_id'            => $request->courseselection == '1' ? $request->section_id : null,
                'medium'                => $request->courseselection == '1' ? $request->medium : null,
                'gender'                => $request->gender == 'all' ? null : $request->gender,
                'reservation_class_id'  => $request->reservation_class_id,
                'rte_status'            => $request->rte_status,
                'installable_amnt'      => $installable_amnt,
                'non_installable_amnt'  => $non_installable_amnt,
                'class_batch_section_medium' => $request->courseselection =='2' ? json_encode($request->multiple_courses) : null,
                'feesfor'               => $request->feesfor

            ];

            // return $fees_mast;
            if($request->courseselection == '1'){
                $batch_name = studentBatch::find($request->batch_id)->batch_name;
            }else{
                $batch_name = collect(batches())->where('id',session('current_batch'))->first()->batch_name;
                $fees_mast['batch_id'] = session('current_batch'); 
            }


            $fees = FeesMast::create($fees_mast);


            if(isset($request->fees_head)){
                // return $request->head_amnt;
                foreach ($request->fees_head as $key => $fee_head) {
                    $fees_heads = [
                        'fees_head_id'  => $fee_head,
                        'head_amnt'      => $request->head_amnt[$key],
                        'fees_id'       => $fees->fees_id,
                        // 'fees_id'       => '1'
                    ];
                    
                    FeesHeadTrans::create($fees_heads);
                }


                //Tution fee check we know tution fee id is 4 
                //later we do this

                // $tution_fee_check = collect($fees_heads)->where('fees_head_id',4)->first();
                // $tution_fee = !empty($tution_fee_check) ? $tution_fee_check['head_amt'] : $tution_fee;
                
            }


            //installable amount we perform all discounts 

          //this payment add with non first installment
            //instalement
            // return $request->no_of_instalment;

            for($i = 0; $i < $request->no_of_instalment;$i++){
                $fees_inst = [
                    'fees_id'       => $fees->fees_id,
                    // 'fees_id'       => '1',
                    'instalment_amnt'=> $request->instalment_amnt[$i],
                    'start_dt'      => $request->start_dt[$i],
                    'end_dt'        => $request->end_dt[$i]
                ];

                FeesInstalment::create($fees_inst);
            }


            if($request->is_fees_student_assign == '1'){
                    $students = studentsMast::select('id','gender','dob','staff_ward','staff_id','bus_fee_id','age','std_class_id','batch_id','medium','section_id');

                    if($request->courseselection == '1'){
                            if($request->feesfor !='1'){
                                $students->whereIn('id',$request->s_id);
                            }

                            $students = $students->with(['siblings.sibling_detail' => function($q){
                                $q->where('students_masts.status','R');
                            }])->where(['batch_id'=>$request->batch_id, 'std_class_id' => $request->std_class_id, 'section_id' => $request->section_id, 'medium'=> $request->medium, 'status'=>'R']);
                    }else{
                        $multiple_course = multiple_courses_get($request->multiple_courses);
                        
                        $students = $students->with(['siblings.sibling_detail' => function($q){
                                $q->where('students_masts.status','R');
                            }])->whereIn('batch_id',$multiple_course['batch_id'])->whereIn('std_class_id',$multiple_course['std_class_id'])->whereIn('section_id',$multiple_course['section_id'])->whereIn('medium',$multiple_course['medium'])->where('status','R');
                    }
                    //filter
                    if($request->gender =='all' && $request->reservation_class_id != 'all'){
                        $students = $students->where(['reservation_class_id' => $request->reservation_class_id]);

                    }else if($request->gender !='all' && $request->reservation_class_id == 'all'){
                        $students = $students->where(['gender' => $request->gender]);

                    }else if($request->gender !='all' && $request->reservation_class_id != 'all'){
                        $students = $students->where(['gender' => $request->gender,'reservation_class_id' => $request->reservation_class_id]);

                    }   

                    $students = $students->get();

                    foreach ($students as $student) {
                     // return $students;             
                      student_fee_assign($student);
                        // $dob  = $student->dob;
                        // $gender  = $student->gender;
                        // $no  = '';
                      
                        // //concession fetch
                        // if($is_fee_discount == '1'){
                        //     $concession_applies  = ConcessionApplyTrans::where(['class_id'=>$student->std_class_id,'batch_id'=>$student->batch_id])->whereIn('fees_head_id',$request->fees_head)->whereHas('concession_students',function($q)use($student){
                        //     $q->where('s_id',$student->id);
                        //     })->with('concession_students')->get();

                        //     $concession_amnt = 0;
                        //     $concession_detl = [];
                        //     foreach ($concession_applies as $concession_apply) {                          
                        //         foreach ($concession_apply->concession_students as $concession_student) {
                        //             $concession_amnt = $concession_student->concession_amnt + $concession_amnt;
                        //         }

                        //         $concession_detl[] = [
                        //             'fees_head_id' => $concession_apply->fees_head_id,
                        //             'concession_amnt' => $concession_amnt,
                        //         ];
                        //     }
                        // }else{
                        //     $concession_amnt = 0;
                        //     $concession_detl = [];
                        // }
                    



                        // //discount variables
                        // $discount_mode = null;
                        // $discount_amnt = null; 
                        // $discount_code = null;
                        // $bus_fee_str = [];
                        // $student_fee_inst = [];
                        // $student_fee_head = [];

                        // $student_fee = [
                        //     'fees_id'               => $fees->fees_id,
                        //     // 'fees_id'               => '1',
                        //     's_id'                  => $student->id,
                        //     'fees_amnt'             => $request->fees_amnt,
                        //     'status'                => isset($request->status) ? $request->status : 'P',
                        //     'online_discount'       => $request->online_discount,
                        //     'installable_amnt'      => $installable_amnt,
                        //     'non_installable_amnt'  => $non_installable_amnt,
                        //     'fine_amnt'             => 0,
                        //     'date'                  => date('Y-m-d'),
                        //     'hostel_amnt'           => 0,
                        //     'concession_amnt'       => $concession_amnt
                            
                        // ];
                        // // $sibling_dicount  = 0;

                        // //Sibling Dicount Fetch     
                        // //When student in teacher so we cant't find student siblings details
                        // if($is_fee_discount == '1'){
                        //     if($student->staff_ward != '1'){              
                        //         if(count($student->siblings) !='0'){
                        //             $dates[] = $dob;  
                        //             foreach ($student->siblings as $std_sib) {
                        //                 $dates[] = $std_sib->sibling_detail->dob;
                        //             }
                          
                        //             foreach ($dates as $date) {
                        //                 $a[] = strtotime($date);
                        //             }
                                   
                        //             asort($a);

                        //             foreach ($a as $value) {
                        //                 $b[] = date('Y-m-d',$value);
                        //             }
                        //             foreach ($b as $key => $value) {
                        //                 if($value == $dob){
                        //                     $no = $key+1;
                        //                 }
                        //             }
                        //             $no = $no == '1' ? '2' : $no;
                                    

                        //             $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => $no,'gender' => $gender,'discount_type_id' => '1','batch_id' => session('current_batch'),'status' => 'A'])->first();

                        //                 $discount_code =  $discount->discount_code;
                        //                 $discount_amnt =  $discount->discount_amnt;
                        //                 $discount_mode =  $discount->discount_mode;    
                                                              
                        //         }

                        //     }else{    

                        //         $discount = Discounts::select('discount_code','discount_mode','discount_amnt')->where(['discount_no_type' => '1','discount_type_id' => '2','batch_id' => session('current_batch'),'status' => 'A'])->first();

                        //         $discount_code =  $discount->discount_code;
                        //         $discount_amnt =  $discount->discount_amnt;
                        //         $discount_mode =  $discount->discount_mode;
                        //     }

                        
                        //     if($discount_mode !=null){
                        //         if($discount_mode ='P'){                                  
                        //            $discount_amnt = $student_fee['discount_amnt'] = ((int)$installable_amnt * $discount->discount_amnt) / 100;
                        //         }else{
                        //             $discount_amnt = $student_fee['discount_amnt'] = $discount->discount_amnt;
                        //         }
                        //     }
                        // }



                        // if($student->bus_fee_id !=null){
                        //     $bus_fee_str = BusFeeStructure::find($student->bus_fee_id);
                        //     $student_fee['bus_amnt'] = $bus_fee_str->bus_fee_amount;

                        // }else{
                        //     $student_fee['bus_amnt'] =0;
                        // }


                        // $bus_amnt = !empty($bus_fee_str)  !=0 ? (float)$bus_fee_str->bus_fee_amount : 0;

                        // $hostel_amnt = 0;

                        // $total_amnt = ((int)$request->fees_amnt + (float)$bus_amnt - (float)$discount_amnt); 

                        // $student_fee['total_amnt']  = $total_amnt;
                        // $student_fee['due_amnt']    = $total_amnt;
                        // $student_fee['batch_id']    = $fees->batch_id;    
                        // $std_fees_mast =  StudentFeesMast::create($student_fee);

                        // $instalment_amnt = ((float)$installable_amnt / (int)$no_of_instalment);
                        // $inst_bus_amnt = (float)$bus_amnt / (int)$no_of_instalment; 
                        // $inst_hostel_amnt = (float)$hostel_amnt / (int)$no_of_instalment; 
                        // $inst_discount_amnt = $discount_amnt !=0 ? ((float)$discount_amnt / $no_of_instalment) : 0;
                        // $inst_concession_amnt = $concession_amnt !=0 ? ((float)$concession_amnt / $no_of_instalment) : 0;

                        // for($m= 0 ; $m < $no_of_instalment ; $m++){
                        //     $inst_amnt = 0;
                        //     if($m == 0){
                        //         $inst_amnt = (float)$instalment_amnt + (float)$non_installable_amnt; 
                        //     }else{
                        //         $inst_amnt = $instalment_amnt;
                        //     }

                        //     $inst_title = str_replace(' ','_',$request->fees_name).'_('.(Arr::get(MEDIUM,$request->medium)).')_'.$batch_name.'_inst_'.date('M',strtotime($request->start_dt[$m])).'-'.date('M',strtotime($request->end_dt[$m]));

                        //     $inst_total_amnt = (float)$inst_amnt + (float)$inst_bus_amnt - (float)$inst_discount_amnt - (float)$inst_concession_amnt;

                        //     $student_fee_inst = [
                        //         's_id'                  => $student->id,
                        //         'inst_title'            => $inst_title,
                        //         // 'std_fees_mast_id'      => '1',
                        //         'std_fees_mast_id'      => $std_fees_mast->std_fees_mast_id,
                        //         'inst_amnt'             => $inst_amnt,
                        //         'inst_concession_amnt'  => $inst_concession_amnt, 
                        //         'inst_discount_amnt'    => $inst_discount_amnt,
                        //         'inst_due_date'         => $request->end_dt[$m],
                        //         'inst_status'           => isset($request->status) ? $request->status : 'P',
                        //         'inst_bus_amnt'         => $inst_bus_amnt,
                        //         'inst_total_amnt'       => $inst_total_amnt,
                        //         'inst_due_amnt'         => $inst_total_amnt,
                        //         'inst_hostel_amnt'      => $inst_hostel_amnt,
                        //     ];

                        //     $std_fee_inst  = StudentFeeInstalment::create($student_fee_inst);
                              
                        //         foreach ($request->fees_head as $k => $fees_head_id) {
                        //             // return $fees_head_id;

                        //             $fee_head_dtl = FeesHeadMast::find($fees_head_id);

                        //             $fee_head_concession_amnt = count($concession_detl) !=0 ? (!empty(collect($concession_detl)->where('fees_head_id',$fees_head_id)->first()) ? collect($concession_detl)->where('fees_head_id',$fees_head_id)->first()['concession_amnt'] : 0)  : 0;

                        //             if($fee_head_dtl->is_installable == '1'){
                        //                 $fee_head_amnt = (float)$request->head_amnt[$k] / (int)$no_of_instalment;
                        //                 $fee_head_discount = $inst_discount_amnt;
                        //                 $fee_head_concession_amnt = (float)$fee_head_concession_amnt / (int)$no_of_instalment;
                        //             }else{
                        //                 $fee_head_amnt = $request->head_amnt[$k];
                        //                 $fee_head_discount = 0;
                        //                 $fee_head_concession_amnt = $fee_head_concession_amnt;
                        //             }
                        //             // return $fee_head_concession_amnt;
                        //             $fee_head_total_amnt = (float)$fee_head_amnt - (float)$fee_head_discount - (float)$fee_head_concession_amnt;
                                       

                        //             if($m == 0){                                        
                        //                 $student_fee_head = [
                        //                     'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                        //                     // 'std_fee_inst_id'         => '1',
                        //                     's_id'                    => $student->id,
                        //                     'fee_head_amnt'           => $fee_head_amnt,
                        //                     'fee_head_name'           => $fee_head_dtl->head_name,   
                        //                     'fee_head_concession_amnt'=> $fee_head_concession_amnt,
                        //                     'fee_head_total_amnt'     => $fee_head_total_amnt,
                        //                     'fee_head_due_amnt'       => $fee_head_total_amnt,  
                        //                     'fee_head_discount'       => $fee_head_discount,  

                        //                 ];
                        //                 StudentFeeHead::create($student_fee_head);
                        //             }
                        //             else{
                        //                 if($fee_head_dtl->is_installable == '1'){
                        //                     $student_fee_head = [
                        //                         'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                        //                         // 'std_fee_inst_id'         => '1',
                        //                         's_id'                    => $student->id,
                        //                         'fee_head_amnt'           => $fee_head_amnt,
                        //                         'fee_head_name'           => $fee_head_dtl->head_name,   
                        //                         'fee_head_concession_amnt'=> $fee_head_concession_amnt,
                        //                         'fee_head_total_amnt'     => $fee_head_total_amnt,
                        //                         'fee_head_due_amnt'       => $fee_head_total_amnt,  
                        //                         'fee_head_discount'       => $fee_head_discount,  

                        //                     ];
                        //                     StudentFeeHead::create($student_fee_head);
                        //                 }
                        //             }

                        //         }
                        //         if(!empty($bus_fee_str) !=0){
                        //              $student_fee_head = [
                        //                 'std_fee_inst_id'         => $std_fee_inst->std_fee_inst_id,
                        //                 // 'std_fee_inst_id'         => '1',
                        //                 's_id'                    => $student->id,
                        //                 'fee_head_amnt'           => $inst_bus_amnt,
                        //                 'fee_head_name'           => 'Bus Fees',   
                        //                 'fee_head_concession_amnt'=> 0,
                        //                 'fee_head_total_amnt'     => $inst_bus_amnt,
                        //                 'fee_head_due_amnt'       => $inst_bus_amnt,  
                        //                 'fee_head_discount'       => 0,  
                        //             ];
                        //             StudentFeeHead::create($student_fee_head);
                        //        }
                        // }

                                // return $student_fee_head;

                    }
                    // return $no;
                
            }


        return redirect()->route('fees.index')->with('success','Fess created successfully');
       // return view ('admin.fees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = FeesMast::with(['class','section','batch','fees_heads.fees_head','fees_instalments'])->find($id);
        $section_manages =array();

        if($fee->courseselection == '2'){
            $multiple_course = multiple_courses_get(json_decode($fee->class_batch_section_medium));

            $section_manages =  SectionManage::with(['batch_name','class_name','section_names'])->whereIn('batch_id',$multiple_course['batch_id'])->whereIn('class_id',$multiple_course['std_class_id'])->whereIn('section_id',$multiple_course['section_id'])->whereIn('medium',$multiple_course['medium'])->get();

        }
        // return $section_manages;
        
        return view('admin.fees.show',compact('fee','section_manages'));
        // dd($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   

        // $headerName = Helpers::headerName();
        $data = FeesMast::with('fees_heads')->where('id',$id)->first();

        $FeesHeadMast = array();
        foreach ($data->fees_heads as  $value) {
            $FeesHeadMast [] = $value->fees_head_id;
        }
        $FeesHead = FeesHeadMast::whereIn('id',$FeesHeadMast)->get();
        // dd($FeesHead);
        return view ('admin.fees.edit',compact('data','headerName','FeesHead'));
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
        dd($id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        //
    }

    public function dashboard(){
        return view ('admin.fees.dashboard');
    }
  
    public function feesSudentList(Request $request){
        // dd($request);
         $students = studentsMast::where('batch_id',$request->batch)
                        ->where('std_class_id',$request->course)
                        ->where('section_id',$request->section)
                        ->get();
        return view ('admin.fees.table',compact('students'));
    } 


    public function pay_regular_fee_index(){
        $classes = studentClass::get(); 
        return view('admin.fees.pay_regular_fee.index',compact('classes'));
    } 

    public function pay_regular_fee_show($std_fees_mast_id){

        $s_id = StudentFeesMast::find($std_fees_mast_id)->s_id;

        $student = studentsMast::find($s_id);

        $student_fee_instalments =  StudentFeeInstalment::whereHas('fee_heads',function($q){
            $q->where('fee_head_status','P');
        })->with(['fee_heads' => function($query){
             $query->where('fee_head_status','P');
        }])->where(['std_fees_mast_id' => $std_fees_mast_id,'inst_status'=>'P'])->get();

        return view('admin.fees.pay_regular_fee.show',compact('student','student_fee_instalments','std_fees_mast_id'));
    }
    
    public function fee_student_fetch(Request $request){
        
        $where = [];
        if($request->admision_no !=''){
            $where['admision_no']  = $request->admision_no;
        }
        if($request->student_name !=''){
            $where['f_name']  = $request->student_name;
            
        }
        if($request->std_class_id !=''){
            $where['std_class_id']  = $request->std_class_id;           
        }
        $where['batch_id'] = session('current_batch');
        // return $where;


        $fee_students =  StudentFeesMast::where('batch_id',session('current_batch'))->whereHas('student',function($q)use($where){
             $q->where($where); 
        })->with(['student' => function($q){
            $q->select('id','f_name','m_name','l_name','username','batch_id','dob','std_class_id','medium','admision_no');
        }])->get();

// dd($request->page);
        // return $fee_students;


        // $fee_students = studentsMast::select('id','f_name','m_name','l_name','username','batch_id','dob','std_class_id','medium','admision_no')->where('batch_id',session('current_batch'))->where('status','R');

        // if($request->admision_no !=''){
        //     $fee_students->where('admision_no',$request->admision_no);
        // }
        // if($request->student_name !=''){
        //     $fee_students->where('f_name',$request->student_name);
        // }
        // if($request->std_class_id !=''){
        //     $fee_students->where('std_class_id',$request->std_class_id);
        // }

        // $fee_students = $fee_students->get();
        if($request->page == 'pay_regular_fee'){
            return view('admin.fees.pay_regular_fee.table',compact('fee_students'));
        }else{
            return $fee_students;
        }
    }



    public function pay_regular_fee_store(Request $request){
        // dd($request->all());
        // return  Str::random(30);
        $total_amnt      = $request->total_amnt;
        $concession_amnt = $request->concession_amnt;
        $total_fine_amnt = $request->total_fine_amnt;
        $discount_amnt   = $request->discount_amnt;
        $charges_amnt    = $request->charges_amnt;
        $payable_amnt    = $request->payable_amnt;
        $receipt_date    = $request->receipt_date;
        $payment_mode    = $request->payment_mode;
        $remarks         = $request->remarks;

        $cash_amount     = $request->cash_amount;
        $transcation_id  = $request->transcation_id;
        $std_fees_mast_id = $request->std_fees_mast_id;
        $s_id = $request->s_id;

        if($request->no_of_cheque_dd != '0'){
            $no_of_cheque_dd = $request->no_of_cheque_dd;
            $cheque_dd_bank = $request->cheque_dd_bank;
            $cheque_dd_no = $request->cheque_dd_no;
            $cheque_dd_amnt = $request->cheque_dd_amnt;
            $payee_name = $request->payee_name;
            $cheque_dd_date = $request->cheque_dd_date;

        }
        
        $total_amnt_reminder = 0;
        $total_amnt = $cash_amount;


        $transcation_id =  $transcation_id !=null ?  $transcation_id  : 'lis_'.Str::random(30);

        //Reciept No generate
        // return $s_id;
        $s_id = str_pad($s_id, 6, '0', STR_PAD_LEFT);

        $fee_reciept =  StudentFeeReceipt::selectRaw('max(SUBSTRING(receipt_bill_no,13,3)) as last_id')->whereRaw('SUBSTRING(receipt_bill_no,7,6) ='.$s_id)->first();
        
        if(!empty($fee_reciept)){
            $last_id = (int)($fee_reciept->last_id) + 1;
        }else{
            $last_id = 1;
        }
        $receipt_bill_no = substr(str_replace('-','',date('Y-m-d')),2).$s_id.str_pad($last_id, 3, '0', STR_PAD_LEFT);

        $feeRecieptData = [
            'receipt_bill_no'   =>  $receipt_bill_no,
            'transcation_id'    =>  $transcation_id,
            'std_fees_mast_id'  =>  $std_fees_mast_id,
            's_id'              =>  $request->s_id,
            'fine_amnt'         =>  $total_fine_amnt,
            'concession_amnt'   =>  $concession_amnt,
            'discount_amnt'     =>  $discount_amnt,
            'charges_amnt'      =>  $charges_amnt,
            'receipt_date'      =>  $receipt_date,
            'payment_mode'      =>  $payment_mode,
            'remarks'           =>  $remarks,
            'payable_amnt'      =>  $cash_amount,
            'total_amnt'        =>  $request->total_amnt
        ];

        $studentMast = StudentFeesMast::find($std_fees_mast_id);


        $fee_reciept =  StudentFeeReceipt::create($feeRecieptData);
        $inst_charges_amnt = (float)$charges_amnt / (int)count($request->student_fee_instalments);
// return $request->student_fee_instalments;

//         die;
        foreach ($request->student_fee_instalments  as $student_fee_instalment) {

            $std_fee_inst_id =  $student_fee_instalment['std_fee_inst_id'];
            $std_fee_instalment = StudentFeeInstalment::find($std_fee_inst_id);
            
            $inst_due_amnt = 0; //for use inside fee head
            $inst_payable_amnt = 0; //for use inside fee head
            $inst_extra_fine_amnt = 0; //for use inside fee head
            
            foreach ($student_fee_instalment['fee_heads'] as $std_fee_head) {
                $fee_head = StudentFeeHead::find($std_fee_head['std_fee_head_id']);
                

                if($total_amnt <= 0){
                    $total_amnt = '0' ;
                }else{
                    $total_amnt = (float)$total_amnt - (float)$std_fee_head['fee_head_pay_amnt'];
                }

                $fee_head_instalment =  StudentFeeInstalment::find($fee_head->std_fee_inst_id);

                if($std_fee_head['fee_head_extra_fine'] != 0){
                    $fee_head->increment('fee_head_extra_fine',$std_fee_head['fee_head_extra_fine']); //extra amount increment fee 
                } 


                if($total_amnt >= 0 ){
                    if($std_fee_head['fee_head_pay_amnt'] != 0){
                        $fee_head->increment('fee_head_paid_amnt', $std_fee_head['fee_head_pay_amnt']);  
                    }


                    $fee_head_data = [                      
                        'fee_head_status'     => 'A',
                        'fee_head_due_amnt'   => 0,
                    ];


                   $fee_head->update($fee_head_data);
                    $inst_payable_amnt = (float)$std_fee_head['fee_head_pay_amnt'] + $inst_payable_amnt;  
                    $fee_head_pay_amnt  = $std_fee_head['fee_head_pay_amnt'];

                }else{
                    $fee_head_pay_amnt = $total_amnt != '0' ? ((float)$fee_head->fee_head_due_amnt - abs((float)$total_amnt)) : 0;


                    if($fee_head_pay_amnt !=0){
                        $fee_head->increment('fee_head_paid_amnt', $fee_head_pay_amnt);                       
                    }
                    $fee_head_data = [

                        'fee_head_status'     => 'P',
                        'fee_head_due_amnt'   => $total_amnt == '0'  ? (float)$fee_head->fee_head_due_amnt : abs((float)$total_amnt),
                    ];
                    
                    $fee_head->update($fee_head_data);
                    $inst_payable_amnt = (float)$fee_head_pay_amnt + $inst_payable_amnt;
                }

                $inst_extra_fine_amnt = $std_fee_head['fee_head_extra_fine'] + $inst_extra_fine_amnt;
                $inst_due_amnt = (float)$fee_head->fee_head_due_amnt + $inst_due_amnt;

                if($fee_head_pay_amnt != 0){
                    $fee_reciept_head = [
                        'receipt_bill_no'   => $receipt_bill_no,
                        'receipt_head_title'=> $fee_head->fee_head_name,
                        's_id'              => $request->s_id,
                        'payable_amnt'      => $fee_head_pay_amnt,
                        'concession_amnt'   => $std_fee_head['fee_head_paid_amnt'] == '0' ? $fee_head->fee_head_concession_amnt : 0,
                        'discount_amnt'     => $std_fee_head['fee_head_paid_amnt'] == '0' ? $fee_head->fee_head_discount : 0,
                        'total_amnt'        => $std_fee_head['fee_head_paid_amnt'] != '0' ? ((float)$std_fee_head['fee_head_pay_amnt'] - (float)$fee_head_pay_amnt) : $std_fee_head['fee_head_pay_amnt'],
                        'fine_amnt'         => $std_fee_head['fee_head_extra_fine'],
                        'std_fee_head_id'   => $std_fee_head['std_fee_head_id'],
                    ];
    //
                    StudentFeeReceiptHead::create($fee_reciept_head);
                }
            }
            // return $fee_reciept_head;
            $std_fee_instalment->increment('inst_extra_fine_amnt',$inst_extra_fine_amnt);
            $std_fee_instalment->increment('inst_payable_amnt',$inst_payable_amnt);
            $std_fee_instalment->increment('inst_charges_amnt',$inst_charges_amnt);

            $std_fee_instalment->update(['inst_due_amnt' => $inst_due_amnt]);

            if($total_amnt == 0){                
               $std_fee_instalment->update(['inst_due_amnt' => 0,'inst_status' => 'A']);
            }else{
               $std_fee_instalment->update(['inst_due_amnt' => $inst_due_amnt,'inst_status' => 'P']);
            }
            # code...
        }
        $studentMast->decrement('due_amnt',$cash_amount);
        $studentMast->increment('payable_amnt',$cash_amount);
        if($studentMast->due_amnt == '0'){
            $studentMast->update(['status' => 'A']);
        }

        return $receipt_bill_no;

    }

    public function pay_dynamic_fee_index(){
        $classes = studentClass::get();

        return view('admin.fees.pay_dynamic_fee.index',compact('classes'));
    }
    public function pay_dynamic_fee_store(Request $request){
        
        $request->validate([
            'std_class_id'  => 'required|not_in:""',
            'payment_mode'  => 'required|not_in:""',
            'std_fees_mast_id' => 'required|not_in:""',
            'amount'        => 'required|not_in:"0"',
            'receipt_date'  => 'required',
            'remarks'       => 'required'
        ]);

        $std_fees_mast_id= $request->std_fees_mast_id;
        // $s_id = StudentFeesMast::find($std_fees_mast_id)->s_id;

        // $student = studentsMast::find($s_id);

        $student_fee_instalments =  StudentFeeInstalment::whereHas('fee_heads',function($q){
            $q->where('fee_head_status','P');
        })->with(['fee_heads' => function($query){
             $query->where('fee_head_status','P');
        }])->where(['std_fees_mast_id' => $std_fees_mast_id,'inst_status'=>'P'])->get();
        return $student_fee_instalments;
    }


    public function fee_success($receipt_bill_no){

        $fee_receipt =  StudentFeeReceipt::with('student')->find($receipt_bill_no);
        return view('admin.fees.pay_regular_fee.fee_success',compact('fee_receipt'));
    }
    public function reciept_download($receipt_bill_no){

        $fee_receipt =  StudentFeeReceipt::with(['student.student_class','student.student_batch','receipt_heads.fee_head'])->find($receipt_bill_no);
        // return $fee_receipt;
        return view('admin.fees.pay_regular_fee.receipt_download',compact('fee_receipt'));
    }

    public function show_transaction_history($std_fees_mast_id){

       $s_id =  StudentFeesMast::find($std_fees_mast_id)->s_id;
       $student = studentsMast::find($s_id);

       $fee_receipts = StudentFeeReceipt::with('receipt_heads.fee_head.fee_instalment')->where('std_fees_mast_id',$std_fees_mast_id)->get();

        return view('admin.fees.pay_regular_fee.show_transcation_history',compact('fee_receipts','student','std_fees_mast_id'));
    }


}
