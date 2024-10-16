<?php

namespace App\Http\Controllers\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// use Spatie\Permission\Models\Role;
use Laratrust\Models\LaratrustRole;
use App\User;
// use Spatie\Permission\Models\Permission;

use Laratrust\Models\LaratrustPermission;
use App\Models\acl\Role;


class RolesController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {       
        // $show_role    = DB::table('roles')->get();
        // $permissions  = DB::table('permissions')->get();
        // // $user         = User::where('user_flag','S')->orWhere('user_flag','T')->get();
        // $user         = User::whereNot('user_flag','S')->orderBy('name')->get();

        $roles = LaratrustRole::all();
        $permissions = LaratrustPermission::all();
        // return $permissions;

        return view('acl.index',compact('roles','permissions'));

        // return view('acl.admin_satting',compact('show_role','permissions','user'));
    }
   
    public function create()
    {
        return view('acl.role.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description'  => 'nullable'
        ]);
        // $data['created_at'] = date("Y-m-d H:i:s"); 
        // $name = $request->name;  

        $role = Role::create($data);
         return redirect()->back()->with('success','Role created successfully.');
    }

    public function show($id)
    {
        $permison_list = DB::table('permission_role')->where('role_id',$id)->get();
        $permission_ids = array();
        foreach ($permison_list as $var) {
            $permission_ids[] = $var->permission_id;
        }
        
        $role = Role::find($id);
        $permissions = DB::table('permissions')->get();
        return view('acl.role.show',compact('role','permissions','permission_ids'));
    }

    public function edit($id)
    {
        $data = DB::table('roles')->find($id);
        return view('acl.role.edit',compact('data'));
    }
   
    public function update(Request $request, $id)
    {
        $id  = $request->id;
        $request->validate(['name' => 'required']);
        
        $update['name'] = $request->name; 
        $update['updated_at'] = date("Y-m-d H:i:s");
        DB::table('roles')->where('id',$id)->update($update);
        return redirect('admin');
    }

    public function destroy($id)
    {
         DB::table('roles')->where('id',$id)->delete();
         return redirect('admin');
    }

    public function saveChanges(Request $request){
        // dd($request);
        $role       = Role::findOrFail($request->roleId);
        $permissionid = $request->permissionId;
        $role->syncPermissions($permissionid);
        return "success" ;
    }
}
