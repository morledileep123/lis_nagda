<?php

namespace App\Http\Controllers\Admin\settings\cbscsection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\CbscInfo;

class CbscInfoController extends Controller
{
    public function index()
    {
        $cbscInfoDatas = CbscInfo::get();
        return view('admin.settings.cbsc-setion.cbsc-information.index',compact('cbscInfoDatas'));
            
    }

   
    public function create()
    {
        return view('admin.settings.cbsc-setion.cbsc-information.create');
        
    }

   
    public function store(Request $request)
    {   

        $request->validate(['cbsc_info_file'=>'required|mimes:pdf|max:10000']);
        $data['cbsc_info_title'] = $request->cbsc_info_title;
        if($request->hasFile('cbsc_info_file')){
            $data['cbsc_info_file'] =  file_upload($request->cbsc_info_file,'CBSC_Information_file');
        }else{
             $data['cbsc_info_file'] = '';
        }
        // dd($data);
        CbscInfo::create($data);

        return redirect()->back()->with('success','CBSC-setion cbsc-information added successfully');

    }

    public function show($id)
    {
        $cbscInfoDatas = CbscInfo::where('cbsc_info_id',$id)->first();
            return view('admin.settings.cbsc-setion.cbsc-information.show',compact('cbscInfoDatas'));
    }

    public function edit($id)
    {
        $cbscInfoDatas = CbscInfo::where('cbsc_info_id',$id)->first();
            return view('admin.settings.cbsc-setion.cbsc-information.edit',compact('cbscInfoDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data['cbsc_info_title'] = $request->cbsc_info_title;
       
        if($request->hasFile('cbsc_info_file')){
            $data['cbsc_info_file'] =  file_upload($request->cbsc_info_file,'CBSC_Information_file');
        }else{
            $dataImg = CbscInfo::where('cbsc_info_id',$id)->select('cbsc_info_file')->first();
            CbscInfo::where('cbsc_info_id',$id)->update(array('cbsc_info_file'=>$dataImg->cbsc_info_file));
        }
        CbscInfo::where('cbsc_info_id',$id)->update($data);

        return redirect()->back()->with('success','CBSC-setion cbsc-information updated successfully');
    }

    
    public function destroy($id)
    {

    }
    
}
