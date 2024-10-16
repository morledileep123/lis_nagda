<?php

namespace App\Http\Controllers\Admin\teachers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\team\TeachersTeam;
use Auth;
use App\User;
use App\Models\master\studentClass;

class TeamsController extends Controller
{
    
    public function index()
    {
        $teams = TeachersTeam::get();
        return view('admin.teachers-team.show',compact('teams'));
    }

    public function create()
    {
         $users = User::where('status',1)->get();
         $class = studentClass::get();
            return view('admin.teachers-team.create',compact('users','class'));
    }

    
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $data = $request->validate([
            'name'  => 'required|max:50|min:3',
            'users_id' => 'required|array|max:10|min:1',
            'class_id' => 'required',
        ]);
        $teams = TeachersTeam::where('parent_id', $id)->get();
        if(!empty($teams)){
            foreach ($teams as $team) {
                if($team->name == $data['name']){
                    return redirect()->back()->with('error','Team name already inserted');
                }
            }
        }
        $data = [
            'name' => $request->name,
            'parent_id' => $id,
            'class_id' => $request->class_id,
        ];
        $data['users_id'] = implode(',',$request->users_id);
        // dd($data);
        $team = TeachersTeam::create($data);

        $user = TeachersTeam::find($team->id);
        // $user->members_assign()->sync($validate['users_d']);

        return redirect()->route('teachers.index')->with('success','Team inserted successfully');
    }

    public function show($id)
    {
        $teams = TeachersTeam::where('parent_id', $id)->get();
            return view('admin.teachers-team.show',compact('teams'));
    }

    public function edit($id)
    {
        $team = TeachersTeam::with('class_name')->find($id);
        $usersIds = explode(",",$team['users_id']);
   
        
        $class = studentClass::get();

        $users = User::with('usersDetails')->whereIn('id',$usersIds)->where('status',1)->get();
        $allUsers = User::with('usersId')->where('status',1)->get();
        // dd($allUsers);
        return view('admin.teachers-team.edit',compact('team','users','class','allUsers'));
    }

    
    public function update(Request $request, $id)
    {
        $id = Auth::user()->id;
        $data = $request->validate([
            'name'  => 'required',
            'users_id' => 'required',
            'class_id' => 'required',
        ]);
        // dd($data);
       $team = TeachersTeam::find($id);
        $teams = TeachersTeam::where('users_id', Auth::user()->id)->get();
        if($team['name'] != $data['name']){
            foreach ($teams as $value) {
                if($value->name == $data['name']){
                    return redirect()->back()->with('error','Team name already inserted');
                }
            }
        }
        $data = [
            'name' => $request->name,
            'parent_id' => $id,
            'class_id' => $request->class_id,
        ];
        $data['users_id'] = implode(',',$request->users_id);
        // $team->update($data);
        TeachersTeam::where('id',$request->id)->update($data);
        // $user =TeachersTeam::find($id);
        // $user->members_assign()->sync($validate['users']);

        return redirect()->route('teachers.index')->with('success','Team updated successfully');
    }

    
    public function destroy($id)
    {
        $team = TeachersTeam::find($id)->delete();
        return redirect()->back()->with('success','Team deleted successfully');
    }
}
