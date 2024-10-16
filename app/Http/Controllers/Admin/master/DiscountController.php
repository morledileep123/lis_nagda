<?php

namespace App\Http\Controllers\Admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\DiscountTypes;
use App\Models\master\Discounts;
use App\Models\master\studentBatch;

class DiscountController extends Controller
{
    
    public function index()
    {
        $data = Discounts::with('disc_type')->where('batch_id',session('current_batch'))->get();
        return view('admin.master.discount.index',compact('data'));
    }

    
    public function create()
    {
         $descountType = DiscountTypes::get();
         // dd(session('current_batch'));
         $studentBatch = studentBatch::get();
        return view('admin.master.discount.create',compact('descountType','studentBatch'));
        
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'discount_type_id'=>'required',
            'discount_name'=>'required',
            'gender'=>'required',
            'discount_no_type'=>'required',
            'discount_desc'=>'required',
            'discount_mode'=>'required',
            'batch_id'=>'required',
            'discount_amnt'=>'required'
        ]);
        // $data['batch_id'] = session('current_batch');
        Discounts::create($data);
        return redirect()->back()->with('success','Discount added successfully');

    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $descountType = DiscountTypes::get();
        $studentBatch = studentBatch::get();
        // dd($studentBatch);
        $edit = Discounts::with('disc_type')->where('discount_code',$id)->first();
                return view('admin.master.discount.edit',compact('edit','descountType','studentBatch'));
    }

   
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'discount_type_id'=>'required',
            'discount_name'=>'required',
            'gender'=>'required',
            'discount_desc'=>'required',
            'discount_mode'=>'required',
            'discount_amnt'=>'required',
            'batch_id'=>'required',
            'discount_no_type'=>'required'
        ]);
        // $data['discount_type_id'] = $request->discount_type_id;
        Discounts::where('discount_code',$id)->update($data);
        return redirect()->back()->with('success','Discount updated successfully');
    }

    
    public function destroy($id)
    {
        //
    }

    public function discountTypeIndex(){
        $descountType = DiscountTypes::get();
        return view('admin.master.discount-type.index',compact('descountType'));
    }
    public function discountTypeCreate(){
        return view('admin.master.discount-type.create');
    }
    public function discountTypeStore(Request $request){
        $request->validate(['discount_type_name'=>'required','discount_type_desc'=>'required','shrt_desc'=>'required']);
            DiscountTypes::create($request->all());
        return redirect()->back()->with('success','Discount type added successfully');

    }
    public function discountTypeEdit($id){
            $edit = DiscountTypes::where('discount_type_id',$id)->first();
                return view('admin.master.discount-type.edit',compact('edit'));


    }public function discountTypeUpdate(Request $request ,$id){
            // $id = $request->discount_type_id; 
            $data = $request->validate(['discount_type_name'=>'required','discount_type_desc'=>'required','shrt_desc'=>'required']);

            DiscountTypes::where('discount_type_id',$id)->update($data);
        return redirect()->back()->with('success','Discount type updated successfully');

        // return redirect()->back()->with('success','Discount type added successfully');

    }
}
