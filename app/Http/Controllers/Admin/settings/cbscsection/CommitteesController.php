<?php

namespace App\Http\Controllers\Admin\settings\cbscsection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Committees;

class CommitteesController extends Controller
{
    public function index()
    {
        $commitiDatas = Committees::get();
        // dd($commitiDatas);
        return view('admin.settings.cbsc-setion.committees.index',compact('commitiDatas'));
            
    }

   
    public function create()
    {
        return view('admin.settings.cbsc-setion.committees.create');
        
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'commitees_title'=>'required',
            'commitees_des'=>'required',
        ]);
        if($request->hasFile('commitees_image')){
            $data['commitees_image'] =  file_upload($request->commitees_image,'CBSC_commitees_image');
        }else{
             $data['commitees_image'] = '';
        }
        Committees::create($data);

        return redirect()->back()->with('success','CBSC-setion commitees added successfully');

    }

    public function show($id)
    {
        $commitiDatas = Committees::where('commitees_id',$id)->first();
            return view('admin.settings.cbsc-setion.commitees.show',compact('commitiDatas'));
    }

    public function edit($id)
    {
        $commitiDatas = Committees::where('commitees_id',$id)->first();
            return view('admin.settings.cbsc-setion.committees.edit',compact('commitiDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'commitees_title'=>'required',
            'commitees_des'=>'required',
        ]);
        if($request->hasFile('commitees_image')){
            $data['commitees_image'] =  file_upload($request->commitees_image,'CBSC_commitees_image');
        }else{
            $dataImg = Committees::where('commitees_id',$id)->select('commitees_image')->first();
            Committees::where('commitees_id',$id)->update(array('commitees_image'=>$dataImg->commitees_image));
        }
        Committees::where('commitees_id',$id)->update($data);

        return redirect()->back()->with('success','CBSC-setion commitees updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }
    public function dashboard()
    {
        return view('admin.settings.cbsc-setion.dashboard');
        
    }
}
