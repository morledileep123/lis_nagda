<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\HeaderBar;

class HeaderController extends Controller
{
    
    public function index()
    {
        $headerbarDatas = HeaderBar::get();
        return view('admin.settings.header.index',compact('headerbarDatas'));
        
    }

   public function create()
    {
        return view('admin.settings.header.create');
        
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'header_bar_email'=>'required',
            'header_bar_mobile'=>'required',
        ]);
        if($request->flag == 'add'){
            HeaderBar::create($data);
            return redirect()->back()->with('success','Header bar added successfully');
        }else{
            HeaderBar::where('header_bar_id',$request->header_bar_id)->update($data);
            return redirect()->back()->with('success','Header bar added updated successfully');
        }

    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        //
    }
}
