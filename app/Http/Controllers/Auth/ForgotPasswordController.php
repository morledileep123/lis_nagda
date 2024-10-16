<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Userresetpassword;
use App\User;
use Illuminate\Support\Facades\Mail;
use Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPasswordController extends Controller 
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function send_mail(Request $request)
    {
        // return $request;
         $request->validate([
            'email' => 'required|email|exists:users',
        ]); 

        $input = $request->all(); 
        $tokens = Str::random(64);

        $product= Userresetpassword::insert([
                'email' =>  $request->email,
                'tokens' =>  $tokens,
                'created_at' =>  Carbon::now(),
            ]);

        \Mail::send('contactMail', array( 

            'email' => $input['email'],  
            'tokens' => $tokens,     

        ), function($message) use ($request){ 

            $message->to($request->email)->subject('Forgot Password'); 

        }); 

        return redirect()->back()->with('status', 'We have e-mailed your password reset link!');
    }

    public function ResetPassword($tokens) {
        return view('forgetPassword', ['tokens' => $tokens]);
    }

    public function ResetPasswordStore(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);
         $update = Userresetpassword::where(['email' => $request->email, 'tokens' => $request->tokens])->first();

        if(!$update){
            return back()->withInput()->with('error', 'Invalid tokens!');
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        // Delete password_resets record
        Userresetpassword::where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been successfully changed!');
    }
}
