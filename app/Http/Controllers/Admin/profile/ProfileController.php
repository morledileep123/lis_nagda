<?php

namespace App\Http\Controllers\Admin\profile;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\countryMast;
use App\Models\master\stateMast;
use App\Models\master\cityMast;
use App\Models\student\studentsMast;

class ProfileController extends Controller
{


    public function __construct()
    {
         $this->middleware('auth');
         $this->country   = countryMast::get();
         $this->state     = stateMast::get();
         $this->city      = cityMast::get();
    }
    
    public function index()
    {
        $id = Auth::user()->parent_id;
        if ($id) {
            $user = User::with('city','state','country')->find($id);
        }else{
            $user = User::with('city','state','country')->find(Auth::user()->id);

        }
        return view('admin.profile.index',compact('user'));
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $country   = $this->country;
        $state     = $this->state;
        $city      = $this->city;
        $getUserData = User::with('city','state','country')->find($id);
        return view('admin.profile.edit',compact('getUserData','country','state','city'));
    }

    
    public function update(Request $request, $id)
    {
        // $getUserData = user::find($id);

            $data = $request->validate([
                    'name' =>'required'
            ]);
            $data['mobile_no'] = $request->mobile;
            $data['dob'] = $request->dob;
            $data['alternative_mo_no'] = $request->alternative_mo_no;
            if($request->photo !=null){
                $verify = $request->validate([
                    'photo' =>'required|image|mimes:jpeg,png,jpg' 
                ]);
                $data['photo'] =  file_upload($request->photo,'users_profile');
            }
            else{
                $getUser = user::find($id);
                $data['photo'] = $getUser->photo;
            }
            user::where('id',$id)->update($data);

        return redirect()->back()->with('success','Profile Updated successfully');

    }

    public function destroy($id)
    {
        //
    }


}
