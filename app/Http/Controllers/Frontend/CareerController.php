<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Career;
use App\Models\setting\Openings;

class CareerController extends Controller
{
   
    public function openings(){
        $openingsDatas = Openings::get();
    	return view('frontend.More.openings',compact('openingsDatas'));

    }
     public function career(){
    	return view('frontend/More/career');

    }
     public function store(Request $request){
     	$data  = $request->validate([
     		'name'=>'required',
     		'email'=>'required',
     		'subject'=>'required',
     		'post'=>'required',
     		'resume'=>'required|max:10000|mimes:doc,docx,pdf',
     		'message'=>'required'
     	]);
     	if($request->hasFile('resume')){
            $data['resume'] =  file_upload($request->resume,'Career');
        }

        Career::create($data);

        	return redirect()->back()->with('success','Job apply successfull');


    }


}
