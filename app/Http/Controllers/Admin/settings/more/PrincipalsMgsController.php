<?php

namespace App\Http\Controllers\Admin\settings\more;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\PrincipalsMgs;

class PrincipalsMgsController extends Controller
{


    public function index()
    {
        $principalmgsDatas = PrincipalsMgs::get();
        return view('admin.settings.more.principale-messagess.index',compact('principalmgsDatas'));
            
    }

   
    public function create()
    {
        return view('admin.settings.more.principale-messagess.create',);
        
    }

   
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'principals_msg_title'=>'required',
        //     'principals_msg_des'=>'required',
        // ]);
        $data['principals_msg_title'] = $request->principals_msg_title;
        $data['principals_msg_des'] = $request->principals_msg_des;
        if($request->hasFile('principals_msg_image')){
            $data['principals_msg_image'] =  file_upload($request->principals_msg_image,'principals_msg_image');
        }else{
             $data['principals_msg_image'] = '';
        }
        PrincipalsMgs::create($data);

        return redirect()->back()->with('success','PrincipalsMgs added successfully');

    }

    public function show($id)
    {
        $principalmgsDatas = PrincipalsMgs::where('principals_msg_id',$id)->first();
            return view('admin.settings.more.principale-messagess.show',compact('principalmgsDatas'));
    }

    public function edit($id)
    {
        $principalmgsDatas = PrincipalsMgs::where('principals_msg_id',$id)->first();
            return view('admin.settings.more.principale-messagess.edit',compact('principalmgsDatas'));
    }

   
    public function update(Request $request, $id)
    {
        $data['principals_msg_title'] = $request->principals_msg_title;
        $data['principals_msg_des'] = $request->principals_msg_des;
        if($request->hasFile('principals_msg_image')){
            $data['principals_msg_image'] =  file_upload($request->principals_msg_image,'principals_msg_image');
        }else{
            $dataImg = PrincipalsMgs::where('principals_msg_id',$id)->select('principals_msg_image')->first();
            PrincipalsMgs::where('principals_msg_id',$id)->update(array('principals_msg_image'=>$dataImg->principals_msg_image));
        }
        PrincipalsMgs::where('principals_msg_id',$id)->update($data);

        return redirect()->back()->with('success','PrincipalsMgs updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
