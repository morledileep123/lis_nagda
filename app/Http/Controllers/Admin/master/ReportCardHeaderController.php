<?php

namespace App\Http\Controllers\Admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\DiscountTypes;
use App\Models\master\Discounts;
use App\Models\master\studentBatch;
use App\Models\master\studentClass;
use App\Models\master\ReportCardTitle;
use App\Models\master\ReportCardHeader;
use App\Models\master\studentSectionMast;

class ReportCardHeaderController extends Controller
{
    public function index()
    {
         $classes = studentClass::get();
         $reportCardHeaders = ReportCardHeader::get();

        return view('admin.master.report-card-header.index',compact('classes','reportCardHeaders'));
    }

    
    public function create()
    {
        $classes = studentClass::get();
         // dd(session('current_batch'));
         $studentBatch = studentBatch::get();
        return view('admin.master.report-card-header.create',compact('studentBatch','classes'));
        
    }

    
    public function store(Request $request)
    {

        // $data = $request->validate([
        //     'header_name'=>'required',
        //     'std_class_from_id'=>'required',
        //     'std_class_to_id'=>'required',
        //     'batch_id'=>'required',
        //     'section_id'=>'required',
        //     'medium'=>'required'
        //     // 'header_title'=>'required'
        // ]);
         $data = ([
            'header_name'=>$request->header_name,
            'std_class_from_id'=>$request->std_class_id,
            'std_class_to_id'=>$request->std_class_to_id,
            'batch_id'=>$request->batch_id,
            'section_id'=>$request->section_id,
            'medium'=>$request->medium,
            'report_card_type'=>$request->report_card_type
            // 'header_title'=>'required'
        ]);
        // dd($data);
       $findcomanData = ReportCardHeader::where(['report_card_type'=>$request->report_card_type,'std_class_from_id'=>$request->std_class_id,'std_class_to_id'=>$request->std_class_to_id,'batch_id'=>$request->batch_id,'section_id'=>$request->section_id,'medium'=>$request->medium,'header_name'=>$request->header_name])->get();
       // echo($request->header_name);
       // dd($findcomanData->header_name);
       if (count($findcomanData) >0) {
            return redirect()->back()->with('warning','This Report card header already added');
       }else{
          $reportCardHeader =  ReportCardHeader::create($data);
          
            foreach ($request->header_title as $key => $value) {
                $data1 = ([
                    'headers_id' =>$reportCardHeader->id,
                    'header_title' =>$value,
                    'report_card_type' =>$request->repCardtype
                ]); 
                ReportCardTitle::create($data1);
            }
            return redirect()->back()->with('success','Report card header added successfully');
       }

    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
         $classes = studentClass::get();
         // dd(session('current_batch'));
         $studentBatch = studentBatch::get();
         $studentSections = studentSectionMast::get();
         $reportCardHeader =  ReportCardHeader::with('report_card_headre')->where('id',$id)->first();
        // dd($reportCardHeader->report_card_headre);
        return view('admin.master.report-card-header.edit',compact('reportCardHeader','classes','studentBatch','studentSections'));
    }

   
    public function update(Request $request, $id)
    {

        dd($request->all());
        $data = $request->validate([
            'header_name'=>'required',
            'std_class_from_id'=>'required',
            'std_class_to_id'=>'required',
            'batch_id'=>'required',
            'medium'=>'required',
            'section_id'=>'required',
            'report_card_type'=>'required'

            
            // 'header_title'=>'required'
        ]);
        // dd($request->all());
       $reportCardHeader =  ReportCardHeader::where('id',$id)->update($data);
                // dd($request->headers_titles_id);
        if($request->header_title){
            foreach ($request->header_title as $key => $value) {

                $data1 = ([
                    'header_title' =>$value
                ]); 
                if(!empty($request->headers_titles_id[$key])){

                    ReportCardTitle::where('headers_titles_id',$request->headers_titles_id[$key])->update($data1);

                }if($request->headers_titles_id[$key] == null){
                    $data1['headers_id'] = $id;
                    ReportCardTitle::create($data1);
                }
            }
        }
                    // dd($data1);

        return redirect()->back()->with('success','Report card header updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }

   
    
   
}
