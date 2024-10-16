<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class StudentErrorExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
	public $errors;

	public function __construct($errors){
		$this->errors = $errors;
	}
    
    public function collection()
    {
        $errors = $this->errors;
	    return collect($errors);
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
            'Caste',
            'Religion',
            'Aadhar Number',
            'Address Line',
            'City',
            'State',
            'Country',
            'Family Income',
            'Siblings',
            'Teacher Ward',
            'Bank Name',
            'IFSC Code',
            'Account No',
            'Blood Group',
            'Status',
            'Subject (Optional)',
            'Fee Assign',
            'Error Field'
        ];
	}
}
