<?php

namespace App\Http\Controllers\Admin\transport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transport\BusFeeStructure;

class TransportController extends Controller
{
    public function index(){    	
    	return view('admin.transport.index');
    }

    public function bus_fee_index(){
    	$bus_fees = BusFeeStructure::orderBy('bus_fee_id','ASC')->get();
    	return view('admin.transport.bus_fees.index',compact('bus_fees'));
    }

    public function bus_fee_create(){
    	return view('admin.transport.bus_fees.create');
    }
    public function bus_fee_store(Request $request){    	
    	$data = $this->bus_fee_validation($request);
    	BusFeeStructure::create($data);
    	return redirect()->back()->with('success','Bus fee structure created successfully.');
    	return redirect()->route('bus_fee_index')->with('success','Bus fee structure created successfully.');

    	// return view('admin.transport.bus_fees.create');
    }
    public function bus_fee_edit($id){
    	$bus_fee = BusFeeStructure::find($id);
    	return view('admin.transport.bus_fees.edit',compact('bus_fee'));
    }  
    public function bus_fee_update(Request $request, $id){
    	$data = $this->bus_fee_validation($request);
    	$bus_fee = BusFeeStructure::find($id);
    	$bus_fee->update($data);
    	return redirect()->back()->with('success','Bus fee structure updated successfully.');
    	
    }
    public function bus_fee_validation($request){
    	return $request->validate([
    		'bus_fee_from'	=> 'required',
    		'bus_fee_to'	=> 'required',
    		'bus_fee_title'	=> 'required',
    		'bus_fee_amount'=> 'required',
    		'bus_fee_status'=> 'required|not_in:""',

    	]);
    }
    
}
