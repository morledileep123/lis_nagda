<?php

namespace App\Http\Controllers\Admin\fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fees\ConcessionMast;
use App\Models\fees\ConcessionApplyTrans;
use App\Models\fees\ConcessionStudent;
use App\Models\student\studentsMast;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\fees\FeesHeadMast;
use App\Models\student\studentsGuardiantMast;





use App\Models\fees\StudentFeeHead;
use App\Models\fees\StudentFeeInstalment;
use App\Models\fees\StudentFeeReceipt;
use App\Models\fees\StudentFeeReceiptHead;
use App\Models\fees\StudentFeesMast;

use App\Models\master\Discounts;
use App\Models\transport\BusFeeStructure;

class ConcessionController extends Controller
{
   
    public function index()
    {
        $concession = ConcessionMast::get();
        return view('admin.fees.concession.index',compact('concession'));
    }

   
    public function create()
    {
        return view('admin.fees.concession.create');
        
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required','concession_amnt'=>'required']);

        $data['discount'] = $request->discount;
        $data['conses_desc'] = $request->conses_desc;

        ConcessionMast::create($data);
        return redirect('concession')->with('success','Fess concession created successfully');


    }

    public function show($id)
    {
       $showConcessionStd =  ConcessionMast::with('concession_apply.student_consession')->where('concession_id',$id)->get();
            return view('admin.fees.concession.show',compact('showConcessionStd'));

        
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
        ConcessionStudent::where('s_id',$id)->delete();
        return redirect('concession')->with('success','Fess concession student deleted successfully');

    }

    public function concessionApply(){
        $classes = studentClass::get();
        $batch = studentBatch::get();
        $fees_heads = FeesHeadMast::get();
        $concession = ConcessionMast::get();
            return view('admin.fees.concession.apply',compact('classes','batch','fees_heads','concession'));
    }
    public function concessionStudents(Request $request){

        // return $request->head_id;

        $concession_apply = ConcessionApplyTrans::with(['concession_students'])->where(['class_id' => $request->std_class_id,'batch_id' => $request->batch_id,'fees_head_id' => $request->head_id])->first();
        $student_ids = [];
        if(!empty($concession_apply)){
            foreach ($concession_apply->concession_students as $concession_student) {
                $student_ids[] = [
                    's_id' => $concession_student->s_id
                ];
            }
        }
      

        $students = studentsMast::where('std_class_id',$request->std_class_id)
                    ->where('batch_id',$request->batch_id)
                    ->where('status','R')
                    ->get();

        return view('admin.fees.concession.students_table',compact('students','student_ids'));
    } 
    public function concessionApplyStore(Request $request){
// return $request->all();
         // dd( $consession_amnt);
        $request->validate([
            'std_class_id'=>'required',
            'batch_id'=>'required',
            'head_id'=>'required'
        ]);


        $data['class_id'] = $request->std_class_id;
        $data['batch_id'] = $request->batch_id;
        $data['fees_head_id'] = $request->head_id;

        if(!empty($request->s_id)){

            $concession_apply = ConcessionApplyTrans::where(['class_id' => $request->std_class_id,'batch_id' => $request->batch_id,'fees_head_id' => $request->head_id])->first();

            if(!empty($concession_apply)){
                $concession_apply_id = $concession_apply->concession_apply_id;
            }else{
                $concession_apply_id = ConcessionApplyTrans::create($data)->concession_apply_id;
            }

            foreach ($request->concession_id as $key => $concession_id) {
                // print_r($key);
                foreach ($request->s_id as $key => $s_id) {
                    $concession_amnt = ConcessionMast::find($concession_id)->concession_amnt;
                    $concession_student = [
                        'concession_apply_id'=> $concession_apply_id,
                        's_id'               => $s_id,
                        'concession_id'      => $concession_id,
                        'concession_amnt'    => $concession_amnt
                    ];
                 ConcessionStudent::create($concession_student);  

                  $student_fee =   StudentFeesMast::whereHas('student_instalments',function($q){
                    $q->where('inst_status','P');
                  })->with(['student_instalments' => function($q){
                    $q->where('inst_status','P')->whereHas('fee_heads',function($query){
                        $query->where('fee_head_status','P');
                    })->with(['fee_heads' => function($query){
                        $query->where('fee_head_status','P')->with('fee_head_mast');
                    }]);
                  }])->where(['batch_id'=>$request->batch_id,'s_id' => $s_id,'status'=>'P'])->where('s_id',$s_id)->first();

                  

                  // return $student_fee;
                  if(!empty($student_fee)){

                      $student_fee->increment('concession_amnt',$concession_amnt);
                      $student_fee->decrement('total_amnt',$concession_amnt);
                      $student_fee->decrement('due_amnt',$concession_amnt);


                        $inst_concession_amnt = (float)$concession_amnt / (int)count($student_fee->student_instalments);
                        foreach ($student_fee->student_instalments as $student_instalment) {
                            $student_fee_instl = StudentFeeInstalment::find($student_instalment->std_fee_inst_id);

                            $student_fee_instl->decrement('inst_total_amnt',$inst_concession_amnt);
                            $student_fee_instl->decrement('inst_due_amnt',$inst_concession_amnt);
                            $student_fee_instl->increment('inst_concession_amnt',$inst_concession_amnt);

                            // return $inst_concession_amnt;

                            foreach ($student_instalment->fee_heads as $fee_head) {
                                if($fee_head->fee_head_mast !=null){
                                    // return $fee_head;
                                    if($fee_head->fees_head_id == $request->head_id){
                                        $student_fee_inst_head = StudentFeeHead::find($fee_head->std_fee_head_id);
                                        if($fee_head->fee_head_mast->is_installable == '1'){
                                            $student_fee_inst_head->decrement('fee_head_total_amnt',$inst_concession_amnt);
                                            $student_fee_inst_head->decrement('fee_head_due_amnt',$inst_concession_amnt);
                                            $student_fee_inst_head->increment('fee_head_concession_amnt',$inst_concession_amnt);
                                            // return $student_fee_inst_head;
                                        }else{
                                            $student_fee_inst_head->decrement('fee_head_total_amnt',$concession_amnt);
                                            $student_fee_inst_head->decrement('fee_head_due_amnt',$concession_amnt);
                                            $student_fee_inst_head->increment('fee_head_concession_amnt',$concession_amnt);
                                        }
                                    }                                    
                                }
                            }
                        }
                  }
                  // return $student_fee;

                }
            }
        }
        else{   
            return redirect()->back()->with('error','Please select student');
        }

        return redirect('concession')->with('success','Fess concession apply successfully');

    }
}
