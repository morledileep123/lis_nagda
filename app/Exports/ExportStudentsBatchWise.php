<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\student\studentsMast;
use Auth;
use App\Models\student\StudentSiblings;

class ExportStudentsBatchWise implements  FromCollection, WithHeadings,WithMapping {
	use Exportable;
	public $request;
	public function __construct($request){
		$this->request = $request;
	}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $data  = studentsMast::with('student_batch','student_section','student_class','p_country','p_state','p_city','studentsGuardiantMast')
					       ->where('batch_id',$this->request->batch_id)
					       ->where('std_class_id',$this->request->std_class_id)
					       ->where('section_id',$this->request->section_id)
					       ->where('user_id',Auth::user()->id)
					       ->get();
        /*$data = StudentMast::with('qual_catg','qual_course','batch','reservation','country','language')->where('batch_id',$this->request->batch_id)->where('user_id',Auth::user()->id);

    	if($this->request->batch_id !='' && $this->request->qual_year !=''  && $this->request->semester !=''){
    		$data = $data->where('qual_year',$this->request->qual_year)
    					->where('semester',$this->request->semester);	
    	}
    	elseif ($this->request->batch_id !='' && $this->request->qual_year) {
    		$data = $data->where('qual_year',$this->request->qual_year);
    	}*/
          return $data;
    }
    public function map($data) : array
    {
      // dd($data);
      foreach ($data->studentsGuardiantMast as $key => $value) {
         $data['g_name'] = $value->g_name;
      }
      if ($data->gender) {
        foreach (GENDER as $key => $value) {
          if ($key == $data->gender ) {
            $data['gender'] = $value;
          }
        }
      }
      if (!empty($data->cast) ) {
        foreach (RELIGION as $key => $value) {
          if ($key == $data->cast ) {
            $data['cast'] = $value;
          }
        }
      }
      if (!empty($data->reservation_class_id) ) {
        foreach (CASTCATEGORY as $key => $value) {
          if ($key == $data->reservation_class_id ) {
            $data['reservation_class_id'] = $value;
          }
        }
      }
     if (!empty($data->sibling_admission)) {
        $siblings = array();
        foreach ($data->sibling_admission as $value) {
            $siblings[] = $value->sibling_admission_no;
        }
      $data['sibling_admission_no'] = implode(',', $siblings);
     }

     if ($data->blood_id) {
       foreach (BLOODGROUP as $key => $value) {
          if ($key == $data->blood_id ) {
            $data['blood_id'] = $value;
          }
        }
     }
     if ($data->blood_id) {
       foreach (STUDENTSTATUS as $key => $value) {
          if ($key == $data->status ) {
              $data['status'] = $key;
          }
        }
     }

      return [
        // $data->student_class->class_name,
        // $data->student_batch->batch_name,
        // $data->student_section->section_name,
        $data->admision_no ? $data->admision_no :'',
        $data->s_ssmid ? $data->s_ssmid :'',
        $data->f_ssmid ? $data->f_ssmid : '',
        $data->f_name ? $data->f_name : '',
        $data->m_name ? $data->m_name : '',
        $data->l_name ? $data->l_name : '',
        $data->dob ? $data->dob : '',
        $data->addm_date ? $data->addm_date : '',
        $data->medium ? $data->medium : '',
        $data->gender ? $data->gender : '',
        $data->g_name ? $data->g_name : '',
        $data->g_name ? $data->g_name : '',
        $data->s_mobile ? $data->s_mobile : '',
        $data->optional_mobile_number ? $data->optional_mobile_number : '',
        $data['reservation_class_id'] ? $data['reservation_class_id'] : '',
        $data['cast'] ? $data['cast'] : '',
        $data->aadhar_card ? $data->aadhar_card : '',
        $data->p_address ? $data->p_address : '',
        $data->p_city ? $data->p_city :'',
        $data->p_state ? $data->p_state : '',
        $data->p_country ? $data->p_country : '',
        $data->family_income ? $data->family_income : '',
        $data['sibling_admission_no'] ? $data['sibling_admission_no'] : '',
        $data->bank_name ? $data->bank_name : '',
        $data->ifsc_code ? $data->ifsc_code : '',
        $data->account_no ? $data->account_no : '',
        $data['blood_id'] ? $data['blood_id'] :'',
        $data['status'] ? $data['status'] : '',
        
      

      ];
    }
    public function headings(): array
    {

        return [
           
            'Admission Number',
            'SSSMID',
            'FAMILY ID',
            'First Name',
            'Middle Name',
            'Last Name',
            'Date of Birth',
            'Date of Admission',
            'Medium',
            'Student Gender',
            'Father Name',
            'Mother Name',
            'Mobile Number',
            'Optional Mobile Number',
            'Category',
            'Religion',
            'Aadhar Number',
            'Address Line',
            'City',
            'State',
            'Country',
            'Family Income',
            'Siblings Scholar Number',
            'Bank Name',
            'IFSC Code',
            'Account No',
            'Blood Group',
            'Status',
            'Subject (Optional)'


        ];

    }
}