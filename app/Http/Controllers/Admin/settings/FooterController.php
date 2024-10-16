<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Footer;
use App\Models\setting\FooterImg;

class FooterController extends Controller
{
    
    public function index(){
        $footerDatas = Footer::get();
        return view('admin.settings.footer.index',compact('footerDatas'));
    }
    public function create(){
        
        return view('admin.settings.footer.create');
    }

   
    public function store(Request $request)
    {

     // $request->validate([
     //            'heading'=>'required',
     //            'footer_des'=>'required',
     //            'footer_image'=>'required',
     //            'image_title'=>'required',
     //    ]);


    $data['heading'] = $request->heading;
    $data['footer_des'] = $request->footer_des;

    $lastId = Footer::create($data);
        foreach ($request->image_title as $key => $image_title) {
            if($request->hasFile('footer_image.'.$key)){
                $foterImg['footer_id'] = $lastId->id;
                $foterImg['footer_image'] =  file_upload($request->footer_image[$key],'footer_image');
                $foterImg['image_title']  = $image_title;

                 FooterImg::create($foterImg);
            }
    }
    
    return redirect()->back()->with('success','Footer created successfully');

   }
    public function show($id)
    {
        $footerDatas = Footer::with('footerImages')->where('footer_id',$id)->first();
         return view('admin.settings.footer.show',compact('footerDatas'));
    }

   
    public function edit($id)
    {
        $footerDatas = Footer::with('footerImages')->where('footer_id',$id)->first();
        // dd($footerDatas);
         return view('admin.settings.footer.edit',compact('footerDatas'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        
     $data['heading'] = $request->heading;
     $data['footer_des'] = $request->footer_des;
      Footer::where('footer_id',$id)->update($data);

        $ids = [];
        if ($request->image_title) {
          # code...
        foreach ($request->image_title as $key => $image_title) {
             $docs = [
                'image_title'     => $image_title,
                'footer_id'       => $id
            ];

            if($request->footer_img_id[$key] !=null){
                $ids[] =$request->footer_img_id[$key];
                $foterImg = FooterImg::where('footer_img_id',$request->footer_img_id[$key])->first();

            }else{
                $foterImg = [];
            }
            if($request->hasFile('footer_image.'.$key)){

                $docs['footer_image'] =  file_upload($request->footer_image[$key],'footer_image',$foterImg);
            }
            if(!empty($foterImg)){
                FooterImg::where('footer_img_id',$request->footer_img_id[$key])->update($docs);
            }else{
                FooterImg::create($docs);
            }
            if(count($ids) !=0){
               FooterImg::whereNotIn('footer_img_id',$request->footer_img_id)->delete();
            }
        }
      }

    return redirect()->back()->with('success','Footer Updated successfully');

   }
    
    public function destroy($id)
    {
        //
    }
}
