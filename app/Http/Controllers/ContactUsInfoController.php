<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\ContactUsInfo;
use Session;

class ContactUsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        return view('backEnd.contactUs.insertContactUsInfo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        //check validation For Request data If pass then go forward
        $validation=$this->chakeValidation($request);

        if($validation->passes()){

            //If validation pass then Save data 
            $data = new ContactUsInfo;
            $data->aboutUs = $request->aboutUs;
            $data->houseNo = $request->houseNo;
            $data->roadNo = $request->roadNo;
            $data->block = $request->block;
            $data->policeStation = $request->policeStation;
            $data->district = $request->district;
            $data->postalCode = $request->postalCode;
            $data->phoneNo = $request->phoneNo;
            $data->emailAddress = $request->emailAddress;
            $data->publicationStatus = $request->publicationStatus;
            $data->save();

        //Return redirect to Back with Success message
        return redirect()->back()->with('success', 'Contact Us Information Save SuccessFully !');
        }else{
            return redirect()->back()
                ->withErrors($validation) 
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        //get all data 
        $contactUsInfos = ContactUsInfo::all();

        //return view with data
        return view('backEnd.contactUs.manageContactUsInfo', ['contactUsInfos'=> $contactUsInfos ]);
    }

    public function view($id){   
        //get all data 
        $contactUsInfo = ContactUsInfo::where('id', $id)->first();

        //return view with data
        return view('backEnd.contactUs.viewContactUsInfo', ['contactUsInfo'=> $contactUsInfo ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //Find Details by id
        $contactUsInfoById = ContactUsInfo::find($id);
        //return view with data
        return view('backEnd.contactUs.editContactUsInfo', ['contactUsInfoById'=> $contactUsInfoById ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $validation=$this->chakeValidation($request);

        if($validation->passes()){

            //Update data 
            $data = ContactUsInfo::find($request->contactUsId);
            $data->aboutUs = $request->aboutUs;
            $data->houseNo = $request->houseNo;
            $data->roadNo = $request->roadNo;
            $data->block = $request->block;
            $data->policeStation = $request->policeStation;
            $data->district = $request->district;
            $data->postalCode = $request->postalCode;
            $data->phoneNo = $request->phoneNo;
            $data->emailAddress = $request->emailAddress;
            $data->publicationStatus = $request->publicationStatus;
            $data->save();
        // return manage page with Successfull message
        return redirect('/contactUs.manage')->with('message', 'Company Information Update SuccessFully !');
        }else{
            return redirect()->back()
                ->withErrors($validation) 
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){  

            // Find and Get data by Id And Delete All info 
            $dataInfoById = ContactUsInfo::find($id);
            $dataInfoById->delete();

        //Return Manage page With Success message
        return redirect('/contactUs.manage')->with('success', 'Contact Us Information Delete SuccessFully !');
    }

    /**
     * Construct the valudation.
     *
     * @return \Illuminate\Http\Response
     */
    public function chakeValidation($request)
    {
        //Create validation
        $validation=Validator::make($request->all(),[
        'aboutUs' => 'required',
        'houseNo' => 'required',
        'roadNo' => 'required',
        'policeStation' => 'required',
        'district' => 'required',
        'phoneNo' => 'required',
        'emailAddress' => 'required|email',
        'publicationStatus' => 'required',

        ]);

    //return validatio
        return $validation;
     
    }

    
}
