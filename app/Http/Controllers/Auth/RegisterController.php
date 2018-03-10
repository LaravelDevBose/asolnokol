<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user.home'; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatore=$this->validator($request->all());
        
        if($validatore->passes()){
            $data = $this->create($request->all())->toArray();

            $data['token']= str_random(25);
            
            $user = User::find($data['id']);
            $user->token = $data['token'];
            $user->save();

            Mail::send('frontEnd.user.confirmMail', $data, function($message) use($data){
                $message->to($data['email']);
                $message->subject('Registration Confirmation.');
            });;

            return redirect('/')->with('registerMessage', 'Confirmation mail has been send. please check your mail.');
        }else{
             return redirect()
                    ->back()
                    ->withErrors($validatore) 
                    ->withInput();
            
        }

    }

    protected function sendConfirmedMail($data){
        
        
    }

    public function confirmation($token){
        $user= User::where('token', $token)->first();
       
        if(!empty($user)){
            $data= User::find($user->id);
            $data->confirmed = 1;
            $data->token = '';
            $data->save();

            return redirect('/')->with('status', 'Your Account Activation is Complete ');
        }

        return redirect('/')->with('status', 'Oops Something Went Wrong');
    }
}
