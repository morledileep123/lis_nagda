<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting\Settings;
use Illuminate\Support\Facades\Storage;
use Auth;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = Settings::get();
        return view('admin.settings.index',compact('getData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.settings.create');
        
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        // dd($request);
         $this->validate($request,[
            'title' => 'required|max:120',
            'logo' => 'required|max:120',
            'email' => 'required|email|unique:settings',
            'mobile1' => 'required|min:10|numeric',
            'tel1' => 'required|min:10|numeric',
            'city_name'=>'required',
            'state_name'=>'required',
            'country_name'=>'required',
            'address'=>'required',
            'zip_code'=>'required',
            'school_code'=>'required',
            'school_board'=>'required',
            ]); 

         $data = [
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'email' => $request->email,
                'website' => $request->website,
                'mobile1' => $request->mobile1,
                'mobile2' => $request->mobile2,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'city_name'=>$request->city_name,
                'state_name'=>$request->state_name,
                'country_name'=>$request->country_name,
                'address'=>$request->address,
                'zip_code'=>$request->zip_code,
                'school_code'=>$request->school_code,
                'cbse_aff_no'=>$request->cbse_aff_no,
                'mbse_aff_no'=>$request->mbse_aff_no,
                'description'=>$request->description,
                'school_board'=>$request->school_board
            ];

             if($request->file('logo')){
                  
               $filename = $request->logo.'_'.time().'.'.$request->logo->getClientOriginalName();
                $year = date('Y');
                $image = $request->logo->storeAs('public/admin/settings'.Auth::user()->id.'/settings/', $filename);

                $data['logo'] = 'admin/settings'.Auth::user()->id.'/settings/'.$filename;
            }
            // dd($data);
            $insertData = Settings::create($data);

            if($insertData){
                return redirect()->route('settings.index')->with('success','settings added successfully');
            }

    }
*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $showData = Settings::where('setting_id',$id)->first();
         return view('admin.settings.show',compact('showData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $showData = Settings::where('setting_id',$id)->first();
         return view('admin.settings.edit',compact('showData'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:120',
            'email' => 'required',
            'mobile1' => 'required|min:10|numeric',
            'tel1' => 'required|min:10|numeric',
            'city_name'=>'required',
            'state_name'=>'required',
            'country_name'=>'required',
            'address'=>'required',
            'zip_code'=>'required',
            'school_code'=>'required',
            'school_board'=>'required',
            ]); 

         $data = [
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'email' => $request->email,
                'website' => $request->website,
                'mobile1' => $request->mobile1,
                'mobile2' => $request->mobile2,
                'tel1' => $request->tel1,
                'tel2' => $request->tel2,
                'city_name'=>$request->city_name,
                'state_name'=>$request->state_name,
                'country_name'=>$request->country_name,
                'address'=>$request->address,
                'zip_code'=>$request->zip_code,
                'school_code'=>$request->school_code,
                'cbse_aff_no'=>$request->cbse_aff_no,
                'mbse_aff_no'=>$request->mbse_aff_no,
                'description'=>$request->description,
                'school_board'=>$request->school_board
            ];

             if($request->file('logo')){
                  
               $filename = $request->logo.'_'.time().'.'.$request->logo->getClientOriginalName();
                $year = date('Y');
                $image = $request->logo->storeAs('public/admin/settings'.Auth::user()->id.'/settings/', $filename);

                $data['logo'] = 'admin/settings'.Auth::user()->id.'/settings/'.$filename;
            }else{
                $getLogo = Settings::where('setting_id',$id)->first();
                $data['logo'] =$getLogo->logo;
            }
            $updateData = Settings::where('setting_id',$id)->update($data);

            if($updateData){
                return redirect()->route('settings.index')->with('success','setting updated successfully');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Settings::where('setting_id',$id)->delete();
         return redirect()->route('settings.index')->with('success','setting deleted successfully');

    }
    public function dashboard()
    {
        // dd('Sd');
        return view('admin.settings.dashboard');

    }
}
