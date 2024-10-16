<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticeCircular;
use Auth;
use App\User;
use App\Models\student\studentsMast;
use App\Models\master\studentBatch;
use App\Models\teachers\Teacher;
use Session;
use App\Models\hrms\EmployeeMast;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Auth::user()->roles;
        $getNotication = NoticeCircular::with('get_circular_id')->where(['batch_id' => session('current_batch')])->get();
        // return $getNotication;
        // $classBatch = array();
        $batchId = array();
        $classesId = array();
        foreach ($getNotication as  $value) {
            foreach ( $value->get_circular_id as  $value1) { 
                $batchId[] = $value1->batch_id;
                $classesId[] = $value1->classes_id; 
            }
        }
        // get data for show notice for perticular students..............
        $userMast = studentsMast::whereIn('batch_id',$batchId)->whereIn('std_class_id',$classesId)->get();
        $currentUser = array();
        foreach ($userMast as  $userData) {
            $currentUser[] = $userData->id;
        }                
        // end show notice for perticular students..............
        // dd( $getNotication );
        $authId = Auth::user()->id; 
        //compare birthday date.............
        $birthUsers = studentsMast::select('id','f_name','m_name','l_name','dob')->where(\DB::raw('substr(dob, 6, 9)'), '=' , date('m-d'))->get();
        $students = studentsMast::where('batch_id',session('current_batch'))->count();
        $studentBatch = studentBatch::get();

        $teachers = EmployeeMast::where('emp_type','T')->orderBy('name')->get();

        return view('home',compact('getNotication','birthUsers','students','studentBatch','teachers','userMast','currentUser'));

    }

    public function studentDashboard(){
        return view('admin.students.student-details.create');

    }  

    public function session_batch_update($id){
        session::put('current_batch',$id);
        return "success";

    }
}
