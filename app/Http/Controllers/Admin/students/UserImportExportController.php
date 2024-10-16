<?php

namespace App\Http\Controllers\Admin\students;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportStudent;
use App\Exports\ExportStudentsBatchWise;
use App\Exports\StudentErrorExport;
use App\Imports\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
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
use Illuminate\Support\Facades\Hash;
use App\Models\student\studentsGuardiantMast;
use App\Models\student\StudentSiblings;
use Response;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;
use App\Models\student\StudenstDoc;

class UserImportExportController extends Controller
{
   
   /**
    * @return \Illuminate\Support\Collection
    */
    public function importExport()
    {
       return view('student-import-export.import');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportAllStudent() 
    {
        // return "";
        return Excel::download(new ExportStudent, 'users.xlsx');
    }

    public function downloadStudentSample(){

        return Response::download(public_path().('/document/excel_format/student_import_format.xlsx'));
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importStudent(Request $request) 
    {

         $request->validate([
            'batch_id' => 'required|not_in:""',
            'std_class_id' => 'required|not_in:""',
            'section_id' => 'required|not_in:""',
            'file' => 'required|mimes:xls,xlsx,csv',
        ],
        [
            'batch_id.*' => 'The batch field is required',
            'std_class_id.*' => 'The class field is required',
            'section_id.*' => 'The section field is required',
        ]);

      
        // return $request->all();
        $status = true;
        $errors = array();
        $qual = array();
        $datas = Excel::toCollection(new ImportStudent,$request->file('file'));
        $error_name = '';

        foreach ($datas as $value) {
            foreach ($value as $data) {  
                if($status){
                    if($data['admission_number'] !=''){
                        if(is_numeric($data['admission_number'])){
                            if(empty(studentsMast::where('admision_no',$data['admission_number'])->first())){
                                $status = true;
                            }else{
                                $error_name = 'Admission number field is required unique.';
                                $status = false;
                            }
                        }else{
                            $error_name = 'Admission number field is not in digit format.';

                            $status = false;
                        }
                       
                    }else{
                        $error_name = 'Admission number field is required.'; 
                        $status = false;
                    }
               
                   $status ? ($data['sssmid'] !='' ? (is_numeric($data['sssmid']) ?  true : ($error_name = "SSMID field is not in number format." ) && $status = false ) : $status   ) : $status;

                 
                   $status =  $status ? ($data['family_id'] !='' ? (is_numeric($data['family_id']) ? true : ($error_name = "Family ID field is not in number format." ) && $status = false ) : $status  ) : $status;

                   $status =  $status ? ($data['first_name'] !='' ?  true : ($error_name = "First Name field is required." ) && ($status = false) ) : $status;

                   $status =  $status ? ($data['last_name'] !='' ?  true : ($error_name = "Last Name field is required." ) && ($status = false) ) : $status;

                    if($status){
                        if($data['date_of_birth'] !=''){
                            $date_of_birth = Date::excelToDateTimeObject($data['date_of_birth'])->format('Y-m-d');
                            $status = true;
                        }else{
                            $error_name = "Date of Birth field is required.";
                            $status = false;
                        }
                    }
                    if($status){
                        if($data['date_of_admission'] !=''){
                            $date_of_admission = Date::excelToDateTimeObject($data['date_of_admission'])->format('Y-m-d');
                            $status = true;
                        }else{
                            $error_name = "Date of Admission field is required.";
                            $status = false;
                        }
                    }

                    $status =  $status ? ($data['medium'] !='' ? (array_key_exists($data['medium'],MEDIUM) ? true : (($error_name = "Medium field is wrong.") && ($status = false))) : (($error_name = "Medium field is required.") && ($status = false))) : $status;

                    $status =  $status ? ($data['student_gender'] !='' ? (array_key_exists($data['student_gender'],GENDER) ? true : (($error_name = "Student gender field is wrong.") && ($status = false))) : (($error_name = "Student gender field is required.") && ($status = false))  ) : $status;

                    $status =  $status ? ($data['father_name'] !='' ?  true : (($error_name = "Father Name field is required.") && ($status = false)) ) : $status;

                    $status =  $status ? ($data['mother_name'] !='' ?  true : (($error_name = "Mother Name field is required.") && ($status = false)) ) : $status;

                    $status =  $status ? ($data['mobile_number'] !='' ?  (is_numeric($data['mobile_number']) ? ((strlen($data['mobile_number']) >= 10 && strlen($data['mobile_number']) <= 13 ) ? true : (($error_name = "Mobile number field is wrong please check digit length.") && ($status = false))) : (($error_name = "Mobile Number field is not in digit format.") && ($status = false))) : (($error_name = "Mobile number field is required.") && ($status = false)) ) : $status;

                    $status =  $status ? ($data['optional_mobile_number'] !='' ?  (is_numeric($data['optional_mobile_number']) ? ((strlen($data['optional_mobile_number']) >= 10 && strlen($data['optional_mobile_number']) <= 13 ) ? true : (($error_name = "Optional Mobile number field is wrong please check digit length.") && ($status = false))) : (($error_name = "Optional Mobile Number field is not in digit format.") && ($status = false))) : true ) : $status;

                    $status =  $status ? ($data['category'] !='' ? (in_array($data['category'],CASTCATEGORY) ? true : (($error_name = "Category field is wrong.") && ($status = false))) : (($error_name = "Category field is required.") && ($status = false))  ) : $status;
// dd(CASTCATEGORY);
                    $status =  $status ? ($data['religion'] !='' ? (in_array($data['religion'],RELIGION) ? true : (($error_name = "Religion field is wrong.") && ($status = false))) : $status  ) : $status;

                    $status =  $status ? ($data['aadhar_number'] !='' ?  (is_numeric($data['aadhar_number']) ? (strlen($data['aadhar_number']) == 12 ? true : (($error_name = "Addhar Card field is not equal to 12 digit.") && ($status = false))) : (($error_name = "Addhar Card field is not in digit format.") && ($status = false))) : $status ) : $status;
                 
                    $status =  $status ? ($data['address_line'] !='' ?  true : (($error_name = "Address Line field is required.") && ($status = false)) ) : $status;
                    $status =  $status ? ($data['city'] !='' ?  true : (($error_name = "City field is required.") && ($status = false)) ) : $status;
                    $status =  $status ? ($data['state'] !='' ?  true : (($error_name = "State field is required.") && ($status = false)) ) : $status;
                    $status =  $status ? ($data['country'] !='' ?  true : (($error_name = "Country field is required.") && ($status = false)) ) : $status;
                    
                    $status =  $status ? ($data['family_income'] !='' ? (is_numeric($data['family_income']) ? true : (($error_name = "Family Income field is not in digit format.") && ($status = false))) : $status  ) : $status;

                    $status =  $status ? ($data['teacher_ward'] !='' ? ((strtolower($data['teacher_ward']) == 'yes' || strtolower($data['teacher_ward']) == 'no') ? true : (($error_name = "Teacher Ward field is wrong.") && ($status = false)) ) : (($error_name = "Teacher Ward field is required.") && ($status = false)) ) : $status;                 

                    $status =  $status ? ($data['account_no'] !='' ? (is_numeric($data['account_no']) ? true : (($error_name = "Account Number field is not in digit format.") && ($status = false))) : $status  ) : $status;

                    $status =  $status ? ($data['blood_group'] !='' ? (in_array($data['blood_group'],BLOODGROUP) ? true : (($error_name = "Blood Group field is wrong.") && ($status = false))) : $status ) : $status;

                    $status =  $status ? ($data['status'] !='' ? (array_key_exists($data['status'],STUDENTSTATUS) ? true : (($error_name = "Status field is wrong.") && ($status = false))) : (($error_name = "Status field is required.") && ($status = false)) ) : $status;



                    $status =  $status ? ($data['fee_assign'] !='' ? ((strtolower($data['fee_assign']) == 'yes' || strtolower($data['fee_assign']) == 'no') ? true : (($error_name = "Fee Assign field is wrong.") && ($status = false)) ) : (($error_name = "Fee Assign field is required.") && ($status = false)) ) : $status;


                    if($status){
                    // return strtolower($data['fee_assign']);
                        $username = strtolower($data['first_name'].$data['last_name'].rand(1,100));

                        $accountCreate = [
                            'username' => $username,
                            'name' => $data['first_name'].' '.$data['last_name'],
                            'password' => Hash::make($username),
                            'user_flag' => 'S',
                            'mobile_no' => $data['mobile_number'],
                            'status'    =>  'A'

                        ];
                        // return $accountCreate;

                        $createUser = User::create($accountCreate);
                        $createUser->attachRole('3');

            
                        $studentData = [
                            'user_id'                   => $createUser->id,
                            'std_class_id'              => $request->std_class_id,
                            'batch_id'                  => $request->batch_id,
                            'section_id'                => $request->section_id,
                            'admision_no'               => $data['admission_number'],
                            'status'                    => $data['status'], 
                            'addm_date'                 => $date_of_admission,
                            'f_name'                    => $data['first_name'],
                            'm_name'                    => $data['middle_name'],
                            'l_name'                    => $data['last_name'],
                            'dob'                       => $date_of_birth,
                            's_mobile'                  => $data['mobile_number'],                           
                            'reservation_class_id'      => $data['category'],
                            'gender'                    => $data['student_gender'],
                            'aadhar_card'               => $data['aadhar_number'],
                            'p_address'                 => $data['address_line'],
                            'p_city'                    => $data['city'],
                            'p_state'                   => $data['state'],
                            'p_country'                 => $data['country'],
                            'same_as'                   => 1,
                            'l_address'                 => $data['address_line'],
                            'l_city'                    => $data['city'],
                            'l_state'                   => $data['state'],
                            'l_country'                 => $data['country'],
                            'family_income'             => $data['family_income'],
                            'medium'                    => $data['medium'],
                            'bank_name'                 => $data['bank_name'],
                            's_ssmid'                   => $data['sssmid'],
                            'f_ssmid'                   => $data['family_id'],
                            'account_no'                => $data['account_no'],
                            'ifsc_code'                 => $data['ifsc_code'],
                            'blood_id'                  => $data['blood_group'],
                            'is_fees_assign'            => strtolower($data['fee_assign']) == 'yes' ? '1' : '0',
                            'staff_ward'                => strtolower($data['teacher_ward']) == 'yes' ? '1' : '0',
                            'cast'                      => $data['caste'],

                        ];

                        $student = studentsMast::create($studentData);
                        // $lastId = 8;
                       
                        if($data['siblings'] !=''){
                            foreach (explode(',', $data['siblings']) as $key => $value) {
                                $siblings = [
                                    's_id'                 => $student->id,
                                    'sibling_admission_no' => $value,
                                    'sibling_no'           => count(explode(',', $data['siblings'])),
                                    'status'               => 'A',
                                ];
                                StudentSiblings::create($siblings);
                            }
                        }
                       
                        $guardians = [];
                        if($data['father_name'] !='') {
                            $guardians = [
                                'g_name'        => $data['father_name'],
                                'relation_id'   => 1,
                                'g_mobile'      => $data['mobile_number'],
                                's_id'          => $student->id
                            ];
                             
                            studentsGuardiantMast::create($guardians);
                        }
                        if($data['mother_name'] !='') {
                            $guardians = [
                                'g_name'        => $data['mother_name'],
                                'relation_id'   => 2,
                                'g_mobile'      => $data['optional_mobile_number'] !='' ? $data['optional_mobile_number'] : $data['mobile_number'] ,
                                's_id'          => $student->id
                            ];
                            studentsGuardiantMast::create($guardians);
                        }


                        $docs = [                          
                            's_id'  => $student->id,
                        ];
                        
                        StudenstDoc::create($docs);
                        //  if($student->is_fees_assign == '1'){
                        //     student_fee_assign($student);
                        // }
                        

                        // return $guardians;
                    }
                    else{
                        $errors[] = [
                            'Admission Number'       => $data['admission_number'],
                            'SSSMID'                 => $data['sssmid'],
                            'FAMILY ID'              => $data['family_id'],
                            'First Name'             => $data['first_name'],
                            'Middle Name'            => $data['middle_name'],
                            'Last Name'              => $data['last_name'],
                            'Date of Birth'          => $data['date_of_birth'] !='' ? Date::excelToDateTimeObject($data['date_of_birth'])->format('Y-m-d') : '',
                            'Date of Admission'      => $data['date_of_admission'] != '' ? Date::excelToDateTimeObject($data['date_of_admission'])->format('Y-m-d') : '',
                            'Medium'                 => $data['medium'],
                            'Student Gender'         => $data['student_gender'],
                            'Father Name'            => $data['father_name'],
                            'Mother Name'            => $data['mother_name'],
                            'Mobile Number'          => $data['mobile_number'],
                            'Optional Mobile Number' => $data['optional_mobile_number'],
                            'Category'               => $data['category'],
                            'Caste'                  => $data['caste'],
                            'Religion'               => $data['religion'],
                            'Aadhar Number'          => $data['aadhar_number'],
                            'Address Line'           => $data['address_line'],
                            'City'                   => $data['city'],
                            'State'                  => $data['state'],
                            'Country'                => $data['country'],
                            'Family Income'          => $data['family_income'],
                            'Siblings'               => $data['siblings'],
                            'Teacher Ward'           => $data['teacher_ward'],
                            'Bank Name'              => $data['bank_name'],
                            'IFSC Code'              => $data['ifsc_code'],
                            'Account No'             => $data['account_no'],
                            'Blood Group'            => $data['blood_group'],
                            'Status'                 => $data['status'],
                            'Subject (Optional)'     => $data['subject_optional'],
                            'Fee Assign'             => $data['fee_assign'],
                            'Error Field'            => $error_name,
                            
                        ];
                        $status = true;
                    }

                }
            }
        }
        // return $siblings;
        if(count($errors) !=0){
            return Excel::download(new StudentErrorExport($errors), 'student_upload_ error_sheet.xlsx');

        }
        // return  $studentData;
        return back()->with('success',"Student uploaded Successfully");
    }

    public function exportclassSectionBatchWise(){
        $batches = studentBatch::get();
        $classes = studentClass::get();
        $sections = studentSectionMast::get();
            return view('admin.students.student-import-export.batch-wise-export',compact('batches','classes','sections'));
    }
    public function batchWiseExport(Request $request){
        // return $request->all();  
        $request->validate([
            'batch_id' => 'required|not_in:""',
            'std_class_id' => 'required|not_in:""',
            'section_id' => 'required|not_in:""'
            ],
            [
                'batch_id.*' => 'The batch field is required',
                'std_class_id.*' => 'The class field is required',
                'section_id.*' => 'The section field is required',
            ]
        );
        $studenInfo  = studentsMast::with('student_batch','student_section','student_class','p_country','p_state','p_city','studentsGuardiantMast')
                           ->where('batch_id',$request->batch_id)
                           ->where('std_class_id',$request->std_class_id)
                           ->where('section_id',$request->section_id)
                           ->where('user_id',Auth::user()->id)
                           ->first();
        if (!empty($studenInfo)) {
            $fileName = "Students of Class".' '.$studenInfo->student_class->class_name.".xlsx";          
         }else{
                return back()->with('error',"Record not availble in this section");

         }                   
               // dd($fileName); 
        return Excel::download(new ExportStudentsBatchWise($request), $fileName);
    }
}
