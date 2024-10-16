<?php

namespace App\Http\Controllers\Admin\hrms;

use Auth;
use File;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hrms\EmployeeMast;
use App\Models\hrms\EmpQualification;
use App\Models\hrms\EmpDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    
    public function index()
    {
        $employees = EmployeeMast::orderBy('name')->get();
        
        return view('admin.hrms.employees.index',compact('employees'));
    }

    
    public function create()
    {
        return view('admin.hrms.employees.create');
        
    }

    
    public function store(Request $request)
    {

        $account_create = [
            'username' => $request->username,
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_flag'  => $request->emp_type,
            'mobile_no'  => $request->s_mobile,
        ];

        $user =   User::create($account_create);

        if($request->emp_type == 'T'){  
            $user->attachRole('2');
        }elseif($request->emp_type == 'H'){
            $user->attachRole('4');
        }elseif($request->emp_type == 'A'){
            $user->attachRole('5');
        }

        $data = $this->validation($request);
        if($request->hasFile('photo')){
            $data['photo'] =  file_upload($request->photo,'Employees_profile');
        }
        if($request->hasFile('signature')){
            $data['signature'] =  file_upload($request->signature,'Employees_signature');
        }

        $data['user_id'] = $user->id;

        $empId  = EmployeeMast::create($data)->id;
        //Employee document create
        foreach ($request->doc_title as $key => $doc_name) {
            $docs = [
                'doc_name'   => $doc_name,
                'doc_desc'   => $request->doc_desc[$key],
                'emp_id'     => $empId
            ];
            if($request->hasFile('doc_file.'.$key)){
               // dd($request->doc_file[$key]);
                $docs['doc_file'] =  file_upload($request->doc_file[$key],'Employees_doc');
            }
            EmpDocument::create($docs);
        }

         //Employee qualification create
            foreach ($request->qual_name as $key => $qual_name) {
                $qual = [
                    'qual_name'      => $qual_name,
                    'percent'        => $request->percent[$key],
                    'grade'          => $request->grade[$key],
                    'year_of_passing'=> $request->year_of_passing[$key],
                    'qual_desc'      => $request->qual_desc[$key],
                    'emp_id'         => $empId
                ];
                if($request->hasFile('qual_doc.'.$key)){
                   // dd($request->doc_file[$key]);
                    $qual['qual_doc'] =  file_upload($request->qual_doc[$key],'EmplQualificationDoc');
                 }
                EmpQualification::create($qual);
            }

        
        // $sendData = [
        //     'message' => 'Hello '.student_name($student).' welcome to lis nagada school',
        //     'mobile' => $data['s_mobile'] 
        // ]; 

    //            $sendMessage = SendMessage::sendCode($sendData);
        return redirect()->back()->with('success','Employee added successfully');
    }

    
    public function show($id)
    {
        $showEmp = EmployeeMast::with(['emp_doc','emp_qaul'])->where('id',$id)->first();
        return view('admin.hrms.employees.show',compact('showEmp'));
    }

   
    public function edit($id)
    {
        $editEmp = EmployeeMast::with(['emp_doc','emp_qaul'])->where('id',$id)->first();
            return view('admin.hrms.employees.edit',compact('editEmp'));
    }

    
    public function update(Request $request, $id)
    {
               // dd($request->emp_doc[$key]);

        // return $request->file();
        $data = $this->validation($request,$id);
        $employee = EmployeeMast::with(['emp_qaul','emp_doc'])->where('id',$id)->first();
        if($request->hasFile('photo')){
            $data['photo'] =  file_upload($request->photo,'Employees_profile','photo',$employee);
        }
        if($request->hasFile('signature')){
            $data['signature'] =  file_upload($request->signature,'Employees_signature','signature',$employee);
        }
       
        EmployeeMast::where('id',$id)->update($data);
        
         //Employee qualification update............
        foreach ($request->qual_name as $key => $qual_name) {
            $qual = [
                'qual_name'      => $qual_name,
                'percent'        => $request->percent[$key],
                'grade'          => $request->grade[$key],
                'year_of_passing'=> $request->year_of_passing[$key],
                'qual_desc'      => $request->qual_desc[$key],
                'emp_id'         => $id
            ];
            // return $request->qual_id;
            if($request->qual_id[$key] !=null){
                $empQualInfo = EmpQualification::where('qual_id',$request->qual_id[$key])->first();
            // dd($empQualInfo);
            }else{
                $empQualInfo = [];
                
            }if($request->hasFile('qual_doc.'.$key)){
               // dd($request->doc_file[$key]);
               $qual['qual_doc'] =  file_upload($request->qual_doc[$key],'EmplQualificationDoc','EmplQualificationDoc',$empQualInfo);
            }if(!empty($empQualInfo)){
                $empQualInfo->update($qual);
            }else{
                EmpQualification::create($qual);
            }
        }

         //Update employee document update......................
        foreach ($request->doc_name as $key => $doc_name) {
            $docs = [
                'doc_name'   => $doc_name,
                'doc_desc'   => $request->doc_desc[$key],
                'emp_id'     => $id
            ];
            if($request->emp_doc_id[$key] !=null){
                $empDocInfo = EmpDocument::where('emp_doc_id',$request->emp_doc_id[$key])->first();
            }else{
                $empDocInfo = [];
                
            }if($request->hasFile('doc_file.'.$key)){
               // dd($request->doc_file[$key]);
                $docs['doc_file'] =  file_upload($request->doc_file[$key],'Employees_doc','Employees_doc',$empDocInfo);
            }if(!empty($empDocInfo)){
                $empDocInfo->update($docs);
            }else{
                EmpDocument::create($docs);
            }
        }

       //Delete employee Qualification and doc......................
        $fordeleteQaul = EmpQualification::where('emp_id',$id)->whereNotIn('qual_id',$request->qual_id)->get();
        foreach ($fordeleteQaul as $deleteQual) {
            if($deleteQual->qual_doc !=null){
                Storage::delete('public/'.$deleteQual->qual_doc);
            }
                EmpQualification::find($deleteQual->qual_id)->delete();
        }

        $fordeleteDocs = EmpDocument::where('emp_id',$id)->whereNotIn('emp_doc_id',$request->emp_doc_id)->get();

        foreach ($fordeleteDocs as $deleteDocs) {
            if($deleteDocs->doc_file !=null){
                Storage::delete('public/'.$deleteDocs->doc_file);
            }
                EmpDocument::find($deleteDocs->emp_doc_id)->delete();
        }
        return redirect()->back()->with('success','Employee Updated successfully');

    }

    
    public function destroy(Request $request, $id)
    {
        if ($request->status == 'active') {
            EmployeeMast::where('id',$id)->update(['status'=>0]);
            EmpDocument::where('emp_id',$id)->update(['status'=>0]);
            EmpQualification::where('emp_id',$id)->update(['status'=>0]);
                return redirect()->back()->with('success','Employee Deactivated successfully');
        }elseif($request->status == 'deactive'){
            EmployeeMast::where('id',$id)->update(['status'=>1]);
            EmpDocument::where('emp_id',$id)->update(['status'=>1]);
            EmpQualification::where('emp_id',$id)->update(['status'=>1]);
                return redirect()->back()->with('success','Employee activated successfully');
        }

        
    }

    public function validation($request,$id=null){
        $request->validate(
            [
            'name'                => 'required',
            'mobile'              => 'required',
            'dob'                 => 'required',
            'emp_type'            => 'required',
            'email'               => 'nullable',
            'gender'              => 'required|not_in:""',
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

            ]
           
        );

        $data = [
            
            'name'          => $request->name,
            'mobile'        => $request->mobile,
            'mobile1'       => $request->mobile1,
            'dob'           => $request->dob,
            'email'         => $request->email,
            'gender'        => $request->gender,
            'religion_id'   => $request->religion_id,
            'blood_group'   => $request->blood_group,
            'age'           => $request->age,
            'joining_date'  => $request->joining_date,
            'year_of_experince'=> $request->year_of_experince,
            'emp_type'      => $request->emp_type,
            'addhar_card'   => $request->addhar_card,
            'pan_card'      => $request->pan_card,
            'voter_id'      => $request->voter_id,
            'driving_licence'=> $request->driving_licence,
            'passport_id'   => $request->passport_id,
            'old_pf_number' => $request->old_pf_number,
            'new_pf_number' => $request->new_pf_number,
            'old_uan_number'=> $request->old_uan_number,
            'new_uan_number'=> $request->new_uan_number,
            'old_esi_number'=> $request->old_esi_number,
            'new_esi_number'=> $request->new_esi_number,
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
            'user_id'       => Auth::user()->id,

        ];


        return $data;
    }

}
