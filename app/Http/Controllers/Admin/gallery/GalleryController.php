<?php

namespace App\Http\Controllers\Admin\gallery;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\gallery\GalleryFolder;
use App\Models\gallery\GalleryImage;
use Illuminate\Support\Facades\Storage;
use Zip;
use File;
class GalleryController extends Controller
{
    public function index(){
    	$galleryFolder = GalleryFolder::with('gallery_image')->get();
    	// dd($galleryFolder);
    	return view('admin.gallery.index',compact('galleryFolder'));
    }
    public function galleryFolder(){
    	return view('admin.gallery.gallery-folder');
    	
    } 
    public function createGalleryFolder(Request $request){

    	$data = $request->validate(['folder_name'=>'required']);
    	$data['user_id'] = Auth::user()->id;
    	$galleryFolder = GalleryFolder::create($data);
    	if ($galleryFolder) {
    		
    	 return redirect()->back()->with('success','Folder created successfully');
    	}
    	
    }
    public function addGalleryImageVideo($id){
    	$folderId =$id;
    	$galleryFolder = GalleryFolder::where('id',$folderId)->with('gallery_image')->first();
    	// dd($galleryFolder);
    	return view('admin.gallery.gallery-image-video',compact('folderId','galleryFolder'));

    }
    public function galleryImageAdd($id){
    		$galleryFolder = GalleryFolder::where('id',$id)->first();
    			return view('admin.gallery.gallery-image-create',compact('galleryFolder'));
    }
    public function galleryImageUpload(Request $request){
    	
    	 // $input = $request->all();
    	// $request->validate(['gallery_image_file' => 'required|mimes:jpeg,jpg,png,gif']);
		    // $images=array();
		    if($request->file('gallery_image_file')){
		        foreach($request->file('gallery_image_file') as $file){
		            $filename = $request->folder_name.'_'.$request->folder_id.'_'.time().'.'.$file->getClientOriginalName();

		             $image = $file->storeAs('public/gallery_'.Auth::user()->name.'/gallery_image', $filename);
                	$gallerImage['gallery_image'] = '/storage/gallery_'.Auth::user()->name.'/gallery_image/'.$filename;
		             // dd($gallerImage);
                	$gallerImage['folder_id'] = $request->folder_id; 
                	GalleryImage::create($gallerImage);
		        }
		    }
		     return redirect()->back()->with('success','Gallery image upload successfully');
    }

    public function galleryFolderDelete($id){

    	$deleteForlder = GalleryFolder::find($id)->delete();
    	$deleteForlderImage = GalleryImage::where('folder_id',$id)->delete();
    	if ($deleteForlder) {
    		return redirect()->back()->with('success','Gallery folder deleted successfully');
    	}
    }
    public function galleryImageDelete($id){

    	$imageName = GalleryImage::find($id);
    	$baePath = url('/');
    	$storagePath = $baePath.$imageName->gallery_image;
    	$data =   Storage::delete($storagePath);
    	// dd($data);
    	$deleteImage = GalleryImage::where('id',$id)->delete();
    	if ($deleteImage) {
    		return redirect()->back()->with('success','Image deleted successfully');
    	}
    }

    public function galleryZipUpload(Request $request){
// dd($request->has('gallery_image'));
    	$request->validate(['gallery_image' => 'required|mimes:zip']);
    	 if($request->has('gallery_image')){
    	 	// return $request->all();
    	 	
    	 	$file = $request->file('gallery_image');
    	 	$file_name = time().'_'.$file->getClientOriginalName();

    	 	$file->storeAs('public/gallery_zip/folder_name/'.$request->folder_name.'/',$file_name);
    	 	$path = 'storage/gallery_zip/folder_name/'.$request->folder_name.'/'.$file_name;

    	 	$zip = Zip::open(public_path($path));
    	 	// dd($zip->listFiles());
    	 	foreach ($zip->listFiles() as $list) {
    	 		$gallerImage['gallery_image'] = 'storage/gallery_zip/folder_name/'.$request->folder_name.'/'.$list;
    	 		$gallerImage['folder_id'] = $request->folder_id;
    	 		// dd($gallerImage);
    	 		GalleryImage::create($gallerImage);
    	 	}
    	 	$zip->extract(public_path().'/storage/gallery_zip/folder_name/'.$request->folder_name);


    	 }
    	 return redirect()->back()->with('success','Gallery image upload successfully');

    }
    public function gallery_test(){

       return view('admin.gallery.test');
    } 
}
