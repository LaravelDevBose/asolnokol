<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\SessionGuard;
use Illuminate\Http\Request;
use App\Admin;
use Session;
use DB;
use Auth;

class AdminLogincontroller extends Controller
{   
    public function __construct(){ 
        $this->middleware('guest:admin',['except'=>['logout']]);
    }



    public function loginFormContent(){
        return view('backEnd.login.loginContent');
    }

    public function adminlogin(Request $request){

        //Validate the form date
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        

        //Attempt to login Admin

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){

            //if SuccessFully done
            return redirect()->intended(route('dashboard'));
        }

        //if not SuccessFull than 

        return redirect()->back()->with('status', 'Email Address And Password Are Not Match !');

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin');
    }

    public function registationFormContent(){
        return view('backEnd.register.registerContent');
    }

    public function registerAdmin(Request $request){

        $validation=Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phoneNo' => 'required',
            'password' => 'required|min:6|confirmed',

            ]);

        if($validation->fails()){
            return redirect()->back()
                    ->withErrors($validation) 
                    ->withInput();
        }
        
        $admin = new Admin();
        $admin->name= $request->name;
        $admin->email= $request->email;
        $admin->phoneNo= $request->phoneNo;
        $admin->password =bcrypt($request->password);
        $admin->save();

        return redirect()->back()-> with('status', 'You Are Regiter Successfully ');
    }
}
