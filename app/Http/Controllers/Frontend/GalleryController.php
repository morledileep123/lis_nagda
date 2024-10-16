<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\gallery\GalleryFolder;
use App\Models\gallery\GalleryImage;
class GalleryController extends Controller
{
    public function index(){
    	$galleryFolder = GalleryFolder::with('gallery_image')->get();
    	// dd($galleryFolder);
    	 return view('frontend.More.gallery',compact('galleryFolder'));
    	// return view('admin.gallery.index',compact('galleryFolder'));
    }

    public function galleryImageShow($id){
    	$folderId =$id;
    	$galleryFolder = GalleryFolder::where('id',$folderId)->with('gallery_image')->first();
    	// dd($galleryFolder);
    	return view('frontend.More.gallery-image-show',compact('folderId','galleryFolder'));
    }
}
