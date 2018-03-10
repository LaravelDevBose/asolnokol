<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Complian;
use App\User;
use Session;

class ComplianMessage extends Controller
{
    public function index()
    {
    	return view('frontEnd.complian.complianAreaContent');
    }

    
     // * Store a newly created resource in storage.
     // *
     // * @param  \Illuminate\Http\Request  $request
     // * @return \Illuminate\Http\Response
     

    public function store(Request $request){

        // print_r($request->all());
        // exit();
        //Check Validation
        $validator = $this->chakeValidation($request);
        if($validator->passes()){
            //If validation Pass Store Data
            $this->storeData($request);
            //Return back to view
            return redirect()->back()->with('com_success', 'Thank You Sir. Your Complian is Send SuccessFully !');         
        }else{
            //if Validation fails Return Back With Message
         return redirect()
                ->back()
                ->withErrors($validator) 
                ->withInput()
                ->with('error_msg',5);
        }
    }


    /**
     * Store data Via this function.
     *just Change Model Name And Input field Name If u Reuse It
     * @return \Illuminate\Http\Response
     */
    private function storeData($request){
        //Ckeck login User Or Not
        //IF login Take Information Form User Table And Store In Comment Tavle
        if (!empty($request->userId)) {
            //Retrive user Information Form user Table
            $userInfo = User::where('id', $request->userId )->first();

            //Store Data In Comment Table
            $data= new Complian;
            $data->name=$userInfo->name;
            $data->email=$userInfo->email;
            $data->subject=$request->subject;
            $data->message=$request->message;
            $data->save();

        } else {
        //Else Not Than Take Data Form Request And Store In Comment Table
            $data= new Complian;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->subject=$request->subject;
            $data->message=$request->message;
            $data->save();
        } 
    }

    /**
     * Construct the valudation.
     *
     * @return \Illuminate\Http\Response
     */
    public function chakeValidation($request){
      //check validation Type
      if (!empty($request->userId)){
         //Create validation
        $validation=Validator::make($request->all(),[
        'subject' => 'required|min:5',
        'message' => 'required|max:2000',
        ]);

      }else{
         
         //Create validation
        $validation=Validator::make($request->all(),[
        'name' => 'required|min:3',
        'email' => 'required',
        'subject' => 'required|min:5',
        'message' => 'required|min:10|max:2000',
        ]);
      }

        //return $validation Result
        return $validation ;        
    }

    public function view()
    {
       $complains = Complian::orderBy('id', 'desc')->paginate(20);
       return view('backEnd.complain.viewComplainMessage', ['complains'=>$complains]);
    }

    public function singelView($id)
    {
       $singelComplian = Complian::where('id', $id)->first();
       return view('backEnd.complain.viewSingelComplain', ['singelComplian'=>$singelComplian]);
    }
}
