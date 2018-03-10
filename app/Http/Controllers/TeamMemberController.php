<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\MemberCategory;
use App\TeamMember;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $memberCategories = MemberCategory::where('publicationStatus', 1)->get();
        return view('backEnd.teamMember.createTeamMember',['memberCategories'=>$memberCategories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //check Valodation Input Data
        $validator = $this->chakeValidation($request);

        if($validator->passes()){
            //move Information Supergobel $File to local $files variable
            $imageInfos=$request->file('image');

            //Sent image to check validation
            $res= $this->checkImageValidaction($imageInfos);
            //check validation 
            if(!$res){
                //if validation pass call moveUplodeImage for move image to folder and get Image url 
                $imageUrl =$this->moveUplodeImage($imageInfos);

                //If validation pass then Save data 
                $teamMember = new TeamMember;
                $teamMember->memberName = $request->memberName;
                $teamMember->memberCategoryeId = $request->memberCategoryeId;
                $teamMember->position = $request->position;
                $teamMember->image = $imageUrl;
                $teamMember->publicationStatus = $request->publicationStatus;
                $teamMember->save();
            }
        }else{
            return redirect('/team.member.insert')
                ->withErrors($validator) 
                ->withInput();
        }

        //Return redirect to Back with Success message
        return redirect()->back()->with('message', 'Team Member Information Save SuccessFully !');
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
        $teamMembers = TeamMember::all();

        //return view with data
        return view('backEnd.teamMember.manageTeamMember', ['teamMembers'=> $teamMembers ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $memberCategories = MemberCategory::where('publicationStatus', 1)->get();
        //Find Details by id
        $teamMemberById = TeamMember::find($id);
        //return view with data
        return view('backEnd.teamMember.editTeamMember', ['teamMemberById'=> $teamMemberById ,'memberCategories'=>$memberCategories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

            // If has new file call uplodeNewImage function
            $imageUrl=$this->uplodeNewImage($request);

            //Update data with New image
            $teamMember = TeamMember::find($request->memberId);
            $teamMember->memberName = $request->memberName;
            $teamMember->memberCategoryeId = $request->memberCategoryeId;
            $teamMember->position = $request->position;
            $teamMember->image = $imageUrl;
            $teamMember->publicationStatus = $request->publicationStatus;
            $teamMember->save();

        // return manage page with Successfull message
        return redirect('/team.member.manage')->with('message', 'Team Member Information Update SuccessFully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){  

        //find TeamMember Info By $id
        $teamMemberById = TeamMember::find($id);

        //Call destroyPvesImage to Delete Image
        $res = $this->destroyPvesImage($teamMemberById);

        // If delete  Enter If Condition
        if(!$res){

            //Again Find and Get TeamMember by Id And Delete All info 
            $teamMemberById = TeamMember::find($id);
            $teamMemberById->delete();
        }
        //If Can not Delete Enter Else Condition 
        else{
            //return back With message
             return redirect()->back()->with('message', 'Oops Something Wrong !');
        }

        //Return Manage page With Success message
        return redirect('/team.member.manage')->with('message', 'Company Information Delete SuccessFully !');
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
        'memberName' => 'required',
        'memberCategoryeId' => 'required',
        'position' => 'required',
        'image' => 'required',
        'publicationStatus' => 'required',

        ]);
        //return $validation Result
        return $validation ;
 
    }

    private function checkImageValidaction($imageInfos){
        //check Image File type 
        $this->checkFileType($imageInfos);
    }

    private function checkFileType($imageInfos){
        //get file type form imageInfos 
        $FileType = $imageInfos->getClientMimeType();

        //check Images file type
        if(!$FileType){

            //If fails return back with status messages
            return redirect()->back()->with('status', 'valid Image File !');
        }
        else{

            //If pass then Forward to checkFileExtention function
            $this->checkFileExtention($imageInfos);
        }
    }

    private function checkFileExtention($imageInfos){

        //get imageExtention form imageInfos
        $imageExtention =$imageInfos->getClientOriginalExtension();

        //check image jpg or png...
        if($imageExtention !='jpg'||$imageExtention !='png'){

            //If image not jpg or png then back to previous page with status message
            return redirect()->back()->with('status', ' Use jpg or png Image File');
        }
        else{
            //If image is png or jpg then Forward to checkImageSize function
            $this->checkImageSize($imageInfos);
        }
    }

    private function checkImageSize($imageInfos){
        //get image Size 
        $imageSize = getimagesize($imageInfos);

        //Check Image Size is it getter then 50000 bit or not
        if($imageSize >50000){
            //If imageSize is getter then 50000 bit then back to Previous page with status message 
            return redirect()->back()->with('status', 'Image  are too large File');
        }
        
    }

    private function moveUplodeImage($imageInfos){
        //Get Image name
        $imageName =$imageInfos->getClientOriginalName();

        //Define Uplode path 
        $uploadPath = 'public/images/teamMember/';

        //move to Define folder
        $imageInfos->move($uploadPath, $imageName);

        //return totel url to join uplodepath and imageName
        return $imageUrl = $uploadPath . $imageName;

    }

    private function uplodeNewImage($request){

        //get Previous Image Information (must be change model name and colame Id)
        $imageinfoById = TeamMember::find($request->teamMemberId);

        //check has new file or not  ...? If has new file the Enter into If Condition
        if($request->hasFile('image')){
            //Get all Infomation About new image
            $newimageInfos=$request->file('image');

            //check Images validation If pass Validation go forward
            if(!$this->checkImageValidaction($newimageInfos)){

                //Distroy Previous Image
                $destryOldImage = $this->destroyPvesImage($imageinfoById);

                //check can Destroy Previous or not
                if(!$destryOldImage){

                    //If Destroy Previous images then move to folder call moveUplodeImages function
                    $imageUrl= $this->moveUplodeImage($newimageInfos);
                }else{
                    //If Can not delete Image then back to previous page with message
                    return redirect()->back()->with('message', 'Can Not Delete Previous Images !');
                }
            }
        }
        //If has no new file then Enter into Else Condition
        else{
            //get previous image url 
            $imageUrl= $imageinfoById->image;
        }

        //return Images url 
        return $imageUrl;

    }

    private function destroyPvesImage($imageinfoById){
        //Destroy Image
        unlink($imageinfoById->image);
    }
}
