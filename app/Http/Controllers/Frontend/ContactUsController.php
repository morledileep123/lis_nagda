<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUsFrom;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsForm;
use App\Models\setting\Contactus;

class ContactUsController extends Controller
{

    public function sendContactUsData(Request $request){

    	$data = $request->validate([
    				'name' => 'required',
    				'email' => 'required',
    				'message' => 'required'
    				]);
    	$contactUsFrom = ContactUsFrom::create($data);
    	if ($contactUsFrom) {
            Mail::to('kishankewat@gmail.com')->send(new ContactUsForm($data));
        	return redirect()->back()->with('success','Contact send successfully');
    		
    	}
    }
    public function settingContactus(){
        $contactusDatas = Contactus::get();
        // dd($contactusDatas);
            return view('frontend.ContactUs.index',compact('contactusDatas'));
    }
}
