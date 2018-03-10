<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\video;
use DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backEnd.video.insertVideoContent');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $basicLink="https://www.youtube.com/embed/";

     //check Valodation Input Data
        $validator = $this->chakeValidation($request);
        if($validator->passes()){
            $videoLink=$basicLink.$request->videoLink;


            $Video = new video;
            $Video->videoTitle = $request->videoTitle;
            $Video->videoLink =$videoLink ;
            $Video->publicationStatus = $request->publicationStatus;
            $Video->save();
            return redirect()->back()->with('success', 'Video Information Save SuccessFully ');
        }else{
            return redirect('/video.insert')
                ->withErrors($validator) 
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){

        $videosInfo = video::where('publicationStatus', 1)->get();
        return view('backEnd.video.manageVideoContent', ['videosInfo'=> $videosInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        
        $videoById = video::where('id', $id)->first();
        return view('backEnd.video.editVideoContent', ['videoById'=>$videoById]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $basicLink="https://www.youtube.com/embed/";
        // chake the validation 

        $validator = $this->chakeValidation($request);
        if($validator->passes()){
            $videoLink=$basicLink.$request->videoLink;
            //update the Data 
            $VideoInfo= video::find($request->videoId);
            $VideoInfo->videoTitle = $request->videoTitle;
            $VideoInfo->videoLink = $videoLink;
            $VideoInfo->publicationStatus = $request->publicationStatus;
            $VideoInfo->save();
            // return to the manage file with value
            return redirect('/video.manage')->with('success', 'Video Information Update SuccessFully !');
        }else{
                return redirect('/video.edit')
                    ->withErrors($validator) 
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
        
        //find Data By $id And use Detele function deleteing  data
        $videoInfo = Video::find($id);
        $videoInfo->delete();
        
        //return to manage file with message 
        return redirect('/video.manage')->with('success', 'Video Information Delete SuccessFully !');
    
    }

    /**
     * Construct the valudation.
     *
     * @return \Illuminate\Http\Response
     */
    public function chakeValidation($request){
        //Create validation
        $validation=Validator::make($request->all(),[
        'videoTitle' => 'required',
        'videoLink' => 'required',
        'publicationStatus' => 'required',

        ]);


        //return $validation Result
        return $validation ;
            
    }
}
