<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\master\studentBatch;
use Session;
class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        
         $email=$request->email;
         $password=$request->password;

     if(Auth::attempt(['email'=>$email,'password'=>$password]))
       {
                return redirect()->intended('home');
         }
      else{
        return redirect()->intended('/');
      }
    }


 
    protected function credentials(Request $request)
    {
      // if(is_numeric($request->get('email'))){
      //   return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
      // }
      // else
      if (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
        return ['email' => $request->get('email'), 'password'=>$request->get('password')];
      }
      return ['username' => $request->get('email'), 'password'=>$request->get('password')];
    }

    public function logout(Request $request)
    {
        session::forget('current_batch');
        $this->guard()->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }
 

}
