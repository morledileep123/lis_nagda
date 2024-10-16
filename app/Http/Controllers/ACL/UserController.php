<?php

namespace App\Http\Controllers\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\acl\Role;
use App\Models\acl\Permission;


class UserController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('user_flag','!=','S')->orderBy('name')->get();
        return view('acl.users.index',compact('users'));
    }

  
    public function create()
    {
        $role  = Role::get();
        return view('acl.users.create',compact('role'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[ 'name' =>'required',
                                   'email' => 'required|email',
                                   'mobile_no'=>'required|numeric',
                                   'role'=>'required|numeric',
                                   'password'=>'required|min:6'
                                 ]);
        // $password = substr($request->name,0,4).'1234';


        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'mobile_no' => $request->mobile_no,
      ]);
        // $name['name']     = strtolower($request->name);
        // $name['password'] = $request->password;
        // $name['username'] = $request->email;
        // $name['mobile_no'] = $request->mobile_no;
        // $data = array(
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => Hash::make($password),
        //         'mobile_no' => $request->mobile_no,
        //         );
        // return $data;
        // $user = User::insert($data);
        // // $user->attachRole(3);

        // $dta = array(
        //     'password' => $password, 
        //     'email' => $request->email,
        //     'mobile_no' => $request->mobile_no,
        // );
        
        // // $dta;
        // Mail::to($request->email)->send(new SendMailable($name));
        return redirect('admin');
    }

   
    public function show($id)
    {
        // dd('');
        $data  = array();
        $data['user']        = User::find($id);
        $data['role']        = Role::get();
        $data['permissions'] = Permission::get();
        $permission          = DB::table('permissions')->where('id',$id)->get();
        $role                = DB::table('role_user')->where('user_id',$id)->get();
        $user                = User::all();      
        $type                = $data['user']->acc_type;  
        // return $data;
        $permission_ids = array();
        $role_ids = array();
        foreach ($permission as $ids) {
            $permission_ids[] = $ids->id; 
        }
        foreach ($role as $roles) {
            $role_ids[] = $roles->role_id; 
        }

        return view('acl.users.show',compact('data','permission_ids','user','role_ids','type'));
    }

    
    public function edit($id)
    {
        $data = User::find($id);
        return view('acl.users.edit',compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name' =>'required',
                                  ]);
        $data = User::find($id);
    
        $data['name'] = $request->name;
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }
       $data->save();
        return redirect('admin');
    }

    
    public function destroy($id)
    {
        User::destroy($id);
        DB::table('fleet_mast')->where('fleet_owner',$id)->delete();
        return redirect('admin');
    }

    public function assign_role($id){
        // return $id;
        $user = User::with('roles')->find($id);

        $roles = Role::all();
        return view('acl.users.assign.role',compact('roles','user'));
    }

    public function changesRole(Request $request){
        $userId = $request->user_id;
        $roleId = $request->role_id;

        $user = User::find($userId);
        // dd($user->roles());
        $user->roles()->sync($roleId);
        return 'success';
        
    }
    public function assign_permission($id){
        // return $id;
        $user = User::with('permissions')->find($id);

        $permissions = Permission::all();
        return view('acl.users.assign.permission',compact('permissions','user'));
    }


    public function changePermission(Request $request){
        // return $request->all();
        $user  = User::find($request->user_id);
        $permissionid = $request->permission_id;
        $user->permissions()->sync($permissionid);
        return 'success';
    }
    public function showUserRolePermission(Request $request){
        // dd($request);
        $id = $request->id;
        $data  = array();
        $data['user']        = User::find($id);
        $data['role']        = Role::get();
        $data['permissions'] = Permission::get();
        $permission          = DB::table('permissions')->where('id',$id)->get();
        $role                = DB::table('role_user')->where('user_id',$id)->get();
        $user                = User::where('id',$id)->get();      
        $type                = $data['user']->acc_type;  
// dd($user);
        $permission_ids = array();
        $role_ids = array();
        foreach ($permission as $ids) {
            $permission_ids[] = $ids->id; 
        }
        foreach ($role as $roles) {
            $role_ids[] = $roles->role_id; 
        }

       if ($request->val == 'role') {

            return view('acl.users.assign-role',compact('data','permission_ids','user','role_ids','type'));

       }elseif($request->val == 'permission'){

            return view('acl.users.assign-permission',compact('data','permission_ids','user','role_ids','type'));
       }

    }
}

