<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }

    public function getSignin(){
        return view('user.signin');
    }

    public function getMainRegistration(){
        return view('user.mainRegistration');
    }

    public function postSignin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
            ]);
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'isResistered' => 1], $request->input('remember'))){
                return redirect()->route('course.allCourses');
            } else {
                return back()->withErrors(['attempt_faild' => 'ID、またはパスワードが間違っています。'])->withInput();
            }
    }

    public function getSignout(){
        Auth::logout();
        return redirect()->route('user.signin');
    }

    public function getAuth($encryptedEmail){
        $email = decrypt($encryptedEmail);
        DB::table('users')->where('email', $email)->update(['isResistered' => 1]);
        return view('user.mainRegistration');
    }
    
    public function postSignup(Request $request){
        $this->validate($request,[
            'email' => 'email|required|unique:users|regex:/shizuoka.ac.jp$/',
            'password' => 'required|regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',
        ]);
        
        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'isResistered' => 0,
        ]);

        $user->save();

        $data = array();

        $encryptedEmail = encrypt($request->input('email'));
        $data['url'] = 'http://218.41.122.9/SJO/public/user/Auth/'.$encryptedEmail;
        Mail::to($request->input('email'))->send(new SendMail($data['url']));

        return view('send');
    }
}
