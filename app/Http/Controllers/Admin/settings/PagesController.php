<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Pages;
use App\Models\setting\PagesImage;
class PagesController extends Controller
{
     public function index(){
        // $pagesDatas = Pages::get();
        $pagesDatas = Pages::with('pageImages')->get();
// dd($pagesDatas);
        return view('admin.settings.pages.index',compact('pagesDatas'));
    }
    public function create(){
        
        return view('admin.settings.pages.create');
    }

   
    public function store(Request $request)
    {
    $data['page_title'] = $request->page_title;
    $data['page_url'] = $request->page_url;
    $data['page_des'] = $request->page_des;
    $lastId = Pages::create($data);
    foreach ($request->page_images as $key => $page_images) {
        if($request->hasFile('page_images.'.$key)){
            $foterImg['page_id'] = $lastId->id;
            $foterImg['page_images'] =  file_upload($page_images,'page_images');
            $foterImg['image_title']  = $request->image_title[$key];
             PagesImage::create($foterImg);
        }
    }
    
    return redirect()->back()->with('success','Pages created successfully');

   }
    public function show($id)
    {
        $footerDatas = Pages::with('pageImages')->where('page_id',$id)->first();
         return view('admin.settings.pages.show',compact('footerDatas'));
    }

   
    public function edit($id)
    {
        $pagesEdit = Pages::with('pageImages')->where('page_id',$id)->first();
         return view('admin.settings.pages.edit',compact('pagesEdit'));
    }

    public function update(Request $request, $id)
    {
        
    $data['page_title'] = $request->page_title;
    $data['page_url'] = $request->page_url;
    $data['page_des'] = $request->page_des;
      Pages::where('page_id',$id)->update($data);
        $ids = [];
        foreach ($request->page_images as $key => $page_images) {
            if($request->hasFile('page_images.'.$key)){

                // $foterImg['page_images'] =  file_upload($page_images,'page_images');
                $foterImg['image_title']  = $request->image_title[$key];


            if($request->footer_img_id[$key] !=null){
                $ids[] =$request->footer_img_id[$key];
                $foterImg = PagesImage::where('page_img_id',$request->footer_img_id[$key])->first();

            }else{
                $foterImg = [];
            }
            if($request->hasFile('page_image.'.$key)){
            // print_r($request->footer_img_id );"<br>";

                $docs['page_image'] =  file_upload($request->page_image[$key],'page_image',$foterImg);
            }
            if(!empty($foterImg)){

                PagesImage::where('page_img_id',$request->footer_img_id[$key])->update($docs);
            }else{
                PagesImage::create($docs);

            }
        }
        if(count($ids) !=0){

           PagesImage::whereNotIn('page_img_id',$ids)->delete();
        }
    }

    return redirect()->back()->with('success','Pages Updated successfully');

   }
    
    public function destroy($id)
    {
        //
    }
}
