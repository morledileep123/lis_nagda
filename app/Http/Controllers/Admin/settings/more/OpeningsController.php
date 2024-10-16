<?php

namespace App\Http\Controllers\Admin\settings\more;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Openings;

class OpeningsController extends Controller
{
    public function index()
    {
        $openingsDatas = Openings::get();
        return view('admin.settings.more.openings.index',compact('openingsDatas'));
            
    }

   
    public function create()
    {
        return view('admin.settings.more.openings.create',);
        
    }

   
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'openings_title'=>'required',
        //     'openings_des'=>'required',
        // ]);
        $data['openings_title'] = $request->openings_title;
        $data['openings_des'] = $request->openings_des;
        if($request->hasFile('openings_image')){
            $data['openings_image'] =  file_upload($request->openings_image,'Openings_image');
        }else{
             $data['openings_image'] = '';
        }
        Openings::create($data);

        return redirect()->back()->with('success','Openings added successfully');

    }

    public function show($id)
    {
        $openingsDatas = Openings::where('openings_id',$id)->first();
            return view('admin.settings.more.openings.show',compact('openingsDatas'));
    }

    public function edit($id)
    {
        $openingsDatas = Openings::where('openings_id',$id)->first();
            return view('admin.settings.more.openings.edit',compact('openingsDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data['openings_title'] = $request->openings_title;
        $data['openings_des'] = $request->openings_des;
        if($request->hasFile('openings_image')){
            $data['openings_image'] =  file_upload($request->openings_image,'Openings_image');
        }else{
            $dataImg = Openings::where('openings_id',$id)->select('openings_image')->first();
            Openings::where('openings_id',$id)->update(array('openings_image'=>$dataImg->openings_image));
        }
        Openings::where('openings_id',$id)->update($data);

        return redirect()->back()->with('success','Openings updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
